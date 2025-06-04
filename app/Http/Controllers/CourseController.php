<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function enroll(Request $request) {
        $request->validate(['course_id' => 'required|exists:courses,id']);
        $user = auth()->user();
        $user->course_id = $request->course_id;
        $user->save();
        return back()->with('success', 'Enrolled in course.');
    }
}
