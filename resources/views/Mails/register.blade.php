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
        <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
            <header>
                <a href="{{ route('home') }}">
                    <img class="w-auto h-16 sm:h-20" src="{{ env('APP_LOGO') }}" alt="">
                </a>
            </header>
        
            <main class="mt-8">
                <h2 class="text-gray-700 dark:text-gray-200">Hi <b>{{ Str::ucfirst($firstname) }} {{ Str::ucfirst($lastname) }}</b>,</h2>
        
                <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                    Thank you for signing up. 
                </p>

                <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300 mb-2">
                    To verify your account, please click on verify button below. 
                </p>
                <a href="{{ route('email.verified', $token)}}" class="px-6 py-2 mt-8 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">Verify</a>
                
                <p class="mt-8 text-gray-600 dark:text-gray-300">
                    Regards, <br>
                    Kanban Project Team
                </p>
            </main>
            
            <footer class="mt-8">
                <p class="text-gray-500 dark:text-gray-400">
                    This email was sent to <a href="#" class="text-blue-600 hover:underline dark:text-blue-400" target="_blank">contact@kanbanproject.com</a>. 
                    If you'd rather not receive this kind of email, you can <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">unsubscribe</a>
                </p>
                <p class="mt-3 text-gray-500 dark:text-gray-400">© <b>{{ config('app.name') }}</b>. All Rights Reserved.</p>
            </footer>
        </section>
    </body>
</html>