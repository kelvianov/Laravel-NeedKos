<?php

namespace App\Http\Controllers;

use App\Models\SavedKos;
use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedKosController extends Controller
{
    /**
     * Toggle save/unsave kos for authenticated user
     */
    public function toggle(Request $request, $kosId)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to save properties'
            ], 401);
        }

        $user = Auth::user();
        $kos = Kos::find($kosId);

        if (!$kos) {
            return response()->json([
                'success' => false,
                'message' => 'Property not found'
            ], 404);
        }

        // Check if already saved
        $savedKos = SavedKos::where('user_id', $user->id)
                           ->where('kos_id', $kosId)
                           ->first();

        if ($savedKos) {
            // Unsave
            $savedKos->delete();
            return response()->json([
                'success' => true,
                'saved' => false,
                'message' => 'Property removed from saved list'
            ]);
        } else {
            // Save
            SavedKos::create([
                'user_id' => $user->id,
                'kos_id' => $kosId
            ]);
            return response()->json([
                'success' => true,
                'saved' => true,
                'message' => 'Property saved successfully'
            ]);
        }
    }

    /**
     * Get saved kos list for authenticated user
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Get saved kos items with pivot data using query builder
        $savedKosData = SavedKos::where('user_id', $user->id)
                                ->with('kos')
                                ->orderBy('created_at', 'desc')
                                ->paginate(12);

        // Transform the data to match the expected structure
        $savedKos = $savedKosData->through(function ($savedKos) {
            $kos = $savedKos->kos;
            // Add pivot data to the kos object
            $kos->pivot = (object) [
                'created_at' => $savedKos->created_at,
                'updated_at' => $savedKos->updated_at
            ];
            return $kos;
        });

        return view('Landing.saved', compact('savedKos'));
    }

    /**
     * Check if kos is saved by authenticated user
     */
    public function checkSaved($kosId)
    {
        if (!Auth::check()) {
            return response()->json(['saved' => false]);
        }

        $saved = SavedKos::where('user_id', Auth::id())
                         ->where('kos_id', $kosId)
                         ->exists();
        
        return response()->json(['saved' => $saved]);
    }
}
