<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }        $validated = $request->validate([
            'kos_id' => 'required|exists:kos,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'images' => 'nullable|array|max:5',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Always use the authenticated user's name
        $validated['name'] = Auth::user()->name;

        // Handle image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('review-images', 'public');
                $imagePaths[] = $path;
            }
        }
        $validated['images'] = $imagePaths;

        $review = Review::create($validated);
        return response()->json(['success' => true, 'review' => $review]);
    }public function index($kos_id)
    {
        $perPage = request('per_page', 7);
        $reviews = Review::where('kos_id', $kos_id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
        return response()->json($reviews);
    }
}
