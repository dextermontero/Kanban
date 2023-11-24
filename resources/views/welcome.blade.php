<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | {{ config('app.name') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        @if (Auth::check())
            <script>window.location = "{{ route('auth.dashboard') }}";</script>
        @endif
    </head>
    <body class="antialiased bg-gray-900 overflow-x-hidden">
        <div class="text-gray-100 flex justify-center items-center xl:min-h-screen min-h-[40rem] p-4">
            <div class="bg-gray-800 rounded shadow w-full min-h-96 xl:w-1/2 p-4">
                <div class="flex justify-center p-4">
                   <h2 class="text-4xl font-medium tracking-wider antialiased">Kanban Board</h2>
                </div>
                <form action="{{ route('login') }}" method="POST" class="mb-4 p-4">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-md font-medium text-gray-200">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="email@kanban.com">
                        @error('email')
                            <div class="py-1 text-red-600 tracking-wider">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block mb-2 text-md font-medium text-gray-200">Password</label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="••••••••••••••••">
                        @error('password')
                            <div class="py-1 text-red-600 tracking-wider">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center h-6">
                            <input id="remember" type="checkbox" name="checkbox" value="" class="w-4 h-4 border border-gray-500 rounded bg-gray-50 focus:ring-3 focus:ring-gray-500">
                            <label for="remember" class="ms-2 text-md font-medium text-gray-200 tracking-wider">Remember me</label>
                        </div>
                        <a href="{{ route('register') }}" class="ms-2 text-md font-medium text-gray-200 tracking-wider hover:underline">Register</a>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Log In</button>
                </form>
            </div>
        </div>

    </body>
    <script type="module">
         toastr.options ={
            "closeButton" : true,
            "progressBar" : true,
            "positionClass" : "toast-bottom-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
        }

        @if(Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif
        
        @if(Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif
        
        @if(Session::has('info'))
            toastr.info("{{ session('info') }}");
        @endif
        
        @if(Session::has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
        </script>
</html>