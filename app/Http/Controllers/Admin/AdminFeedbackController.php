<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFeedbackController extends Controller
{
    /**
     * Display a listing of all feedbacks
     */
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        return view('admin.edit-feedback', compact('feedbacks'));
    }

    /**
     * Update feedback status
     */
    public function updateStatus(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,checked'
        ]);

        $feedback->update([
            'status' => $validated['status']
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Delete feedback
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback berhasil dihapus');
    }
}
