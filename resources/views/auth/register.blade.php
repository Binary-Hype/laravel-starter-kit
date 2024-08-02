<x-layouts.guest>
    <h1>Register</h1>

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

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <input id="name" type="text" name="name" value="{{ old(('name')) }}" autofocus>

        <input id="email" type="email" name="email" value="{{ old(('email')) }}" autofocus>

        <input id="password" type="password" name="password">
        <input id="password_confirmation" type="password" name="password_confirmation">
        <button type="submit">Submit</button>
    </form>
</x-layouts.guest>

