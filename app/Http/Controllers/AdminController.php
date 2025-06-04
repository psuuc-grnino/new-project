<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function addCourse(Request $request) {
        $request->validate(['name' => 'required|string']);
        Course::create(['name' => $request->name]);
        return back()->with('success', 'Course created.');
    }

    public function allFeedbacks() {
        return Feedback::with(['student', 'lecturer'])->get();
    }

    public function viewCourses()
{
    $courses = Course::all();
    $feedbacks = Feedback::with(['student', 'lecturer'])->get();

    return view('admin.courses', compact('courses', 'feedbacks'));
}

}

