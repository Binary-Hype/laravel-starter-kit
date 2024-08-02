<x-layouts.guest>
    <h1>Login</h1>

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

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <input id="email" type="email" name="email" value="{{ old(('email')) }}" autofocus>

        <input id="password" type="password" name="password">

        <label for="remember">
            <input id="remember" type="checkbox" name="remember">
            <span>Remember Me</span>
        </label>
        <button type="submit">Submit</button>
    </form>
</x-layouts.guest>

