<?php

namespace App\Http\Controllers;

use App\Mail\ReportSubmitted;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Notifications\Actions\Action;

class ReportController extends Controller
{
    public function index()
    {
        return view('footercontent.product.report');
    }

    public function store(Request $request)
    {
        // Debug logging
        Log::info('Report submission started', [
            'user_email' => $request->email,
            'category' => $request->category
        ]);

        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'required|string|in:account,payment,technical,other',
            'priority' => 'required|string|in:low,medium,high',
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Simpan ke database
            $report = Report::create([
                'name' => $request->name,
                'email' => $request->email,
                'category' => $request->category,
                'priority' => $request->priority,
                'subject' => $request->subject,
                'message' => $request->description,
                'status' => 'pending'
            ]);

            // Kirim email ke admin
            try {
                $adminEmail = config('mail.admin_email', 'admin@needkos.com');
                Mail::to($adminEmail)->send(new ReportSubmitted($report));
                Log::info('Admin email sent successfully', ['admin_email' => $adminEmail]);
            } catch (\Exception $e) {
                Log::error('Failed to send admin email: ' . $e->getMessage());
            }

            // Kirim konfirmasi ke user
            try {
                Mail::to($request->email)->send(new ReportSubmitted($report, true));
                Log::info('User confirmation email sent successfully', ['user_email' => $request->email]);
            } catch (\Exception $e) {
                Log::error('Failed to send user confirmation email: ' . $e->getMessage());
            }

            // Kirim notifikasi Filament ke semua admin
            try {
                $admins = User::where('role', 'admin')->get();
                
                $priorityColor = match($report->priority) {
                    'high' => 'danger',
                    'medium' => 'warning', 
                    'low' => 'info',
                    default => 'gray'
                };

                $priorityIcon = match($report->priority) {
                    'high' => 'heroicon-o-exclamation-triangle',
                    'medium' => 'heroicon-o-exclamation-circle',
                    'low' => 'heroicon-o-information-circle',
                    default => 'heroicon-o-document-text'
                };

                foreach ($admins as $admin) {
                    // Direct database insert untuk memastikan kompatibilitas dengan Filament
                    DB::table('notifications')->insert([
                        'id' => \Illuminate\Support\Str::uuid(),
                        'type' => 'Filament\\Notifications\\DatabaseNotification',
                        'notifiable_type' => get_class($admin),
                        'notifiable_id' => $admin->id,
                        'data' => json_encode([
                            'title' => 'New Report Received',
                            'body' => "New {$report->priority} priority report from {$report->name}: {$report->subject}",
                            'color' => $priorityColor,
                            'icon' => $priorityIcon,
                            'actions' => [
                                [
                                    'name' => 'view',
                                    'label' => 'View Report',
                                    'url' => route('filament.admin.resources.reports.view', $report),
                                    'button' => true,
                                    'color' => 'primary'
                                ],
                                [
                                    'name' => 'dismiss',
                                    'label' => 'Dismiss',
                                    'color' => 'gray',
                                    'close' => true
                                ]
                            ],
                            'format' => 'filament',
                            'duration' => 'persistent'
                        ]),
                        'read_at' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                
            } catch (\Exception $e) {
                Log::error('Failed to send Filament notifications: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Report berhasil dikirim. Kami akan meninjau laporan Anda dan menghubungi Anda segera.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim report. Silakan coba lagi.'
            ], 500);
        }
    }
}
