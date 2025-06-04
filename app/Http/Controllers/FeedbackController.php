<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Accesstype;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'lecturer_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        Feedback::create([
            'student_id' => auth()->id(),
            'lecturer_id' => $request->lecturer_id,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Feedback submitted.');
    }

    public function studentFeedbacks()
{
    $user = auth()->user();
    $feedbacks = $user->feedbackGiven()->with('lecturer')->get();

    $lecturers = User::where('accesstype_id', AccessType::where('name', 'lecturer')->first()->id)
                    ->where('course_id', $user->course_id)
                    ->get();

    return view('student.feedbacks', compact('feedbacks', 'lecturers'));
}


    public function lecturerFeedbacks()
{
    $user = auth()->user();
    $feedbacks = $user->feedbackReceived()->with('student')->get();
    $course = $user->course;

    return view('lecturer.feedbacks', compact('feedbacks', 'course'));
}

}
