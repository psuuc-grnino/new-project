
@if (!auth()->user()->course)
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
@else
    <h2>Assigned Course</h2>
    <p>{{ auth()->user()->course->name }}</p>
@endif

<h2>Feedbacks from Students</h2>
@foreach ($feedbacks as $fb)
    <p><strong>{{ $fb->student->username }}</strong>: {{ $fb->message }}</p>
@endforeach

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
