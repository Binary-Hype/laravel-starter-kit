<x-layouts.guest>
    <h1>Forgot Password</h1>

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

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form action="/forgot-password" method="POST">
        @csrf

        <input id="email" type="email" name="email">

        <button type="submit">Forgot Password</button>
    </form>
</x-layouts.guest>
