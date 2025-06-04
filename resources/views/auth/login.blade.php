
@if($errors->any())
    <div class="error">
        <strong>Login failed:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}" novalidate>
    @csrf
    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    @error('username') <span class="error">{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Password">
    @error('password') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>

