<x-layouts.guest>
    <h1>Verify Email</h1>

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

    @if(session('status') === 'verification-link-sent')
        <div>
            A link has been sent
        </div>
    @endif

    <div>
        <h2>Resend</h2>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Resend Verify Email</button>
        </form>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

</x-layouts.guest>
