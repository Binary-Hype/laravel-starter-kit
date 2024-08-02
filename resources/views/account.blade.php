<x-layouts.app>
    <h1>Account</h1>

    @if ($errors->any())
        <div>
            <div>Something went wrong!</div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status') === 'profile-information-updated')
        <div class="mb-4 font-medium text-sm text-green-600">
            Profile Info Updated
        </div>
    @endif

    <form action="{{ route('user-profile-information.update') }}" method="POST">
        @csrf
        @method('put')

        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" autofocus>

        <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" autofocus>

        <button type="submit">Update Profile</button>
    </form>

    @if (session('status') === 'password-updated')
        <div class="mb-4 font-medium text-sm text-green-600">
            Password Updated
        </div>
    @endif

    <form action="{{ route('user-password.update') }}" method="POST">
        @csrf
        @method('put')

        <input id="current_password" type="password" name="current_password">

        <input id="password" type="password" name="password">

        <input id="password_confirmation" type="password" name="password_confirmation">

        <button type="submit">Update Password</button>
    </form>

</x-layouts.app>
