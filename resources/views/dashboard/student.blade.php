
<h1>Student Dashboard</h1>

<h2>Enroll in a Course</h2>
<form method="POST" action="/course/enroll">
    @csrf
    <select name="course_id" required>
        @foreach (\App\Models\Course::all() as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>
    <button type="submit">Enroll</button>
</form>


<h2>My Course</h2>
<p>{{ auth()->user()->course->name ?? 'Not enrolled yet' }}</p>

<h2>Submit Feedback</h2>
<form method="POST" action="/feedback">
    @csrf
    <select name="lecturer_id" required>
        @foreach ($lecturers as $lecturer)
            <option value="{{ $lecturer->id }}">{{ $lecturer->username }}</option>
        @endforeach
    </select>
    <textarea name="message" placeholder="Enter your feedback" required></textarea>
    <button type="submit">Submit</button>
</form>

<h2>My Feedbacks</h2>
@foreach ($feedbacks as $fb)
    <p><strong>To {{ $fb->lecturer->username }}</strong>: {{ $fb->message }}</p>
@endforeach


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>