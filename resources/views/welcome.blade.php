<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title !== "" ? $title.' | Kanban Project' : 'Kanban Project'}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body class="antialiased bg-gray-900 overflow-x-hidden">
        <div class="text-gray-100 flex justify-center items-center xl:min-h-screen min-h-[40rem] p-4">
            <div class="bg-gray-800 rounded shadow w-full min-h-96 xl:w-1/2 p-4">
                <div class="flex justify-center p-4">
                   <h2 class="text-4xl font-medium tracking-wider antialiased">Kanban Board</h2>
                </div>
                <form class="mb-4 p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-md font-medium text-gray-200">Email Address</label>
                        <input type="email" id="email" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="email@kanban.com">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-md font-medium text-gray-200">Your password</label>
                        <input type="password" id="password" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="••••••••••••••••">
                    </div>
                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-6">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-500 rounded bg-gray-50 focus:ring-3 focus:ring-gray-500">
                        </div>
                        <label for="remember" class="ms-2 text-md font-medium text-gray-200">Remember me</label>
                    </div>
                    <a href="/dashboard" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Login</a>
                      {{-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Submit</button> --}}
                </form>
            </div>
        </div>
    </body>
</html>