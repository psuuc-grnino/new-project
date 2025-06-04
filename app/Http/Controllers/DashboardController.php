<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Accesstype;

class DashboardController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $role = $user->accesstype->name;

        switch ($role) {
            case 'admin':
                $courses = Course::all();
                $feedbacks = Feedback::with(['student', 'lecturer'])->get();
                return view('dashboard.admin', compact('courses', 'feedbacks'));

            case 'student':
                $course = $user->course;
                $lecturers = User::where('accesstype_id', Accesstype::where('name', 'lecturer')->first()->id)
                                ->where('course_id', $user->course_id)
                                ->get();
                $feedbacks = $user->feedbackGiven()->with('lecturer')->get();
                return view('dashboard.student', compact('course', 'lecturers', 'feedbacks'));

            case 'lecturer':
                $course = $user->course;
                $feedbacks = $user->feedbackReceived()->with('student')->get();
                return view('dashboard.lecturer', compact('course', 'feedbacks'));

            default:
                abort(403);
        }
    }
}

