<x-layouts.auth>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
                    <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                        <div class="font-bold text-2xl">
                            Email Verification
                        </div>
                        <div class="mt-6">
                            Please check your inbox for an email with a verification link and click on it to confirm
                            your
                            email address. If you haven't received it, click "Resend Verification Email" to get a new
                            one.
                            You can also choose to log out by clicking the "Logout" button. Verifying your email helps
                            keep
                            your account secure.
                        </div>

                        @if ($errors->any())
                            <div class="mt-6">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="font-medium text-sm text-red-600">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status') === 'verification-link-sent')
                            <div class="mt-6 font-medium text-sm text-green-600">
                                Verification Link has been sent
                            </div>
                        @elseif (session('status'))
                            <div class="mt-6 font-medium text-sm text-red-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="flex justify-between align-center mt-6">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit"
                                        class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Resend Verification Email
                                </button>
                            </form>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
