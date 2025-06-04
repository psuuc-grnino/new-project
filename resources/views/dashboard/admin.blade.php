
<h1>Admin Dashboard</h1>

<h2>Add Course</h2>
<form method="POST" action="/admin/course">
    @csrf
    <input type="text" name="name" placeholder="Course Name" required>
    <button type="submit">Add</button>
</form>

<h2>All Courses</h2>
<ul>
@forelse ($courses as $course)
    <li>{{ $course->name }}</li>
@empty
    <li>No courses found.</li>
@endforelse
</ul>

<h2>All Feedbacks</h2>
@foreach ($feedbacks as $fb)
    <p><strong>{{ $fb->student->username }}</strong> → <strong>{{ $fb->lecturer->username }}</strong>: {{ $fb->message }}</p>
@endforeach

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
