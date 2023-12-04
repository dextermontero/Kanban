<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Register | {{ config('app.name') }}</title>
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
                   <h2 class="text-4xl font-medium tracking-wider antialiased">Invitation Setup</h2>
                </div>
                <form class="mb-4 p-4">
                    <h2 class="mb-4 text-lg tracking-wider font-sans">Note: Input your password to complete setup</h2>
                    @csrf
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-2 xl:gap-4 mb-2">
                        <div class="mb-1">
                            <label for="firstname" class="block mb-2 text-md font-medium text-gray-200">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="{{ ucwords($info->firstname) }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-400 block rounded-lg w-full placeholder-gray-200" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="lastname" class="block mb-2 text-md font-medium text-gray-200">Last Name</label>
                            <input type="text" id="lastname" name="lastname" value="{{ ucwords($info->lastname) }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-400 block rounded-lg w-full placeholder-gray-200" readonly>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-md font-medium text-gray-200">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ $info->email }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-400 block rounded-lg w-full placeholder-gray-200" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="project_name" class="block mb-2 text-md font-medium text-gray-200">Project</label>
                        <input type="text" id="project_name" name="project_name" value="{{ ucwords($info->project_name) }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-400 block rounded-lg w-full placeholder-gray-200" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="position" class="block mb-2 text-md font-medium text-gray-200">Position</label>
                        <input type="text" id="position" name="position" value="{{ ucwords($info->position) }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-400 block rounded-lg w-full placeholder-gray-200" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block mb-2 text-md font-medium text-gray-200">Password <span class="text-red-600">*</span></label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="••••••••••••••••">
                        <div id="pwError"></div>
                    </div>
                    <button type="submit" id="completeBtn"class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Complete Setup</button>
                    <div class="flex justify-start items-center px-1 mt-2">
                        <span class="text-gray-300">Already have an account? <a href="{{ route('home') }}" class="text-gray-200 font-bold hover:text-gray-600">Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $('#completeBtn').click(function(e) {
                e.preventDefault();
                var token = $('input[type="hidden"]').val();
                var password = $('#password').val();
                if(password.length >= 6){
                    var url = "{{ route('complete.invite',':id') }}";
                    var id = "{{ request()->route('id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            _token: token,
                            id: id,
                            password: password
                        },
                        beforeSend: function(){

                        },
                        success: function(data){
                            console.log(data);
                            if(data.status === "success"){
                                toastr.success(data.message, '', {"timeOut" : 5000,});
                            }else if(data.status === "info"){
                                toastr.info(data.message, '', {"timeOut" : 5000,});
                            }else{
                                toastr.warning(data.message, '', {"timeOut" : 5000,});
                            }
                        }
                    });
                }else{
                    toastr.info("The password must be 6 or more characters!", '', {"timeOut" : 5000,});
                }
            });
        });
    </script>
    <script type="module">
        toastr.options ={
            "closeButton" : true,
            "progressBar" : true,
            "positionClass" : "toast-bottom-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
        }
    </script>
</html>