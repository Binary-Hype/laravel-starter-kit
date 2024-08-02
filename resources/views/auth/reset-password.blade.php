<x-layouts.guest>
    <h1>Reset Password</h1>

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

    <form action="/reset-password" method="POST">
        @csrf
        
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" autofocus>

        <input id="password" type="password" name="password">
        <input id="password_confirmation" type="password" name="password_confirmation">


        <button type="submit">Reset Password</button>
    </form>

</x-layouts.guest>
