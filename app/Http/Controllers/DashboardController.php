<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Kos;

class DashboardController extends Controller
{
    public function index()
    {
        $kosList = Kos::where('user_id', Auth::id())->get();

        return view('dashboard.index', compact('kosList'));
    }
}
