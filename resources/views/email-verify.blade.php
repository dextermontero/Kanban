<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Email Verification | {{ config('app.name') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        @if (Auth::check())
            <script>window.location = "{{ route('auth.dashboard') }}";</script>
        @endif
    </head>
    <body class="antialiased bg-gray-900 overflow-x-hidden">
        <div class="text-gray-100 flex justify-center items-center xl:min-h-screen min-h-[40rem] p-4">
            <div class="bg-gray-800 rounded shadow w-full min-h-96 xl:w-1/3 p-4">
                <div class="flex justify-center p-4">
                   <h2 class="text-4xl font-medium tracking-wider antialiased">Email Verification</h2>
                </div>
                <form action="{{ route('resend.verify', request()->route('id')) }}" method="POST" class="mb-4 p-4">
                    @csrf
                    <div class="mb-2">
                        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                    </div>
                    <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">Resend Verification</button>
                    <div class="flex justify-start items-center px-1 mt-2">
                        <span class="text-gray-300">Already have an account? <a href="{{ route('home') }}" class="text-gray-200 font-bold hover:text-gray-600">Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>