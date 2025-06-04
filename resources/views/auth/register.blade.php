
@if($errors->any())
    <div class="error">
        <strong>Please fix the following errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}" novalidate>
    @csrf
    <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
    @error('first_name') <span class="error">{{ $message }}</span> @enderror

    <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
    @error('last_name') <span class="error">{{ $message }}</span> @enderror

    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    @error('username') <span class="error">{{ $message }}</span> @enderror

    <input type="password" name="password" placeholder="Password">
    @error('password') <span class="error">{{ $message }}</span> @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm Password">

   <select name="accesstype_id" style="color: black; background-color: white;">
    <option value="" disabled {{ old('accesstype_id') ? '' : 'selected' }}>Select Role</option>
    @foreach($accessTypes as $access)
        <option value="{{ $access->id }}" {{ old('accesstype_id') == $access->id ? 'selected' : '' }}>
            {{ ucfirst($access->name) }}
        </option>
    @endforeach
</select>
    @error('accesstype_id') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Register</button>
</form>

