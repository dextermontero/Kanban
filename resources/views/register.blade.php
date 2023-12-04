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
                   <h2 class="text-4xl font-medium tracking-wider antialiased">Create Account</h2>
                </div>
                <form class="mb-4 p-4" id="formData">
                    @csrf
                    <div class="mb-2">
                        <label for="firstname" class="block mb-2 text-md font-medium text-gray-200">First Name</label>
                        <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" onkeypress="return validateKeypress(alpha);" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="First Name">
                        <div id="fnError"></div>
                    </div>
                    <div class="mb-2">
                        <label for="lastname" class="block mb-2 text-md font-medium text-gray-200">Last Name</label>
                        <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" onkeypress="return validateKeypress(alpha);" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="Last Name">
                        <div id="lnError"></div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-md font-medium text-gray-200">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="email@kanban.com">
                        <div id="emailError"></div>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block mb-2 text-md font-medium text-gray-200">Password</label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}" class="bg-gray-600 border border-gray-400 text-gray-200 text-md focus:ring-gray-700 focus:border-gray-700 block rounded-lg w-full placeholder-gray-200" placeholder="••••••••••••••••">
                        <div id="pwError"></div>
                    </div>
                    <button type="submit" id="registerBtn"class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full px-5 py-2.5 text-center">Register</button>
                    <div class="flex justify-start items-center px-1 mt-2">
                        <span class="text-gray-300">Already have an account? <a href="{{ route('home') }}" class="text-gray-200 font-bold hover:text-gray-600">Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            var fn=0, ln=0, ea=0, pw=0;
            $('#registerBtn').attr('disabled', 'disabled');
            $('#registerBtn').removeClass('hover:bg-blue-800');
            $('#registerBtn').addClass('disabled:opacity-25');
            $('#registerBtn').addClass('cursor-not-allowed');
            $('.mb-2 input').keyup(function() {
                count = Number(fn) + Number(ln) + Number(ea) + Number(pw);
                if(count === 4){
                    $('#registerBtn').addClass('hover:bg-blue-800');
                    $('#registerBtn').removeClass('disabled:opacity-25');
                    $('#registerBtn').removeAttr('disabled','disabled');
                    $('#registerBtn').removeClass('cursor-not-allowed');
                }else{
                    $('#registerBtn').addClass('disabled:opacity-25');
                    $('#registerBtn').removeClass('hover:bg-blue-800');
                    $('#registerBtn').attr('disabled','disabled');
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $('#registerBtn').click(function(e) {
                e.preventDefault();
                var token = $('input[type=hidden]').val();
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var password = $('#password').val();
                if(fn === 1 && ln === 1 && ea === 1 & pw === 1){
                    $(this).html('<i class="fas fa-spinner fa-spin"></i> Creating account');
                    $.ajax({
                        url: '{{ route("register.account") }}',
                        type: 'POST',
                        data: {
                            _token: token,
                            firstname: firstname,
                            lastname: lastname,
                            email: email,
                            password: password
                        },
                        beforeSend: function(data) {
                            $('#firstname').attr('disabled', 'disabled');
                            $('#lastname').attr('disabled', 'disabled');
                            $('#email').attr('disabled', 'disabled');
                            $('#password').attr('disabled', 'disabled');
                            $('#registerBtn').attr('disabled', 'disabled');
                            $('#registerBtn').removeClass('hover:bg-blue-800');
                            $('input').addClass('disabled:opacity-25');
                            $('#registerBtn').addClass('disabled:opacity-25');
                        },
                        success: function(data){
                            if(data.status === 'success'){
                                toastr.success(data.message);
                                setTimeout(() => {
                                    window.location = data.url
                                    $('form').each(function() {
                                        this.reset();
                                    });
                                }, 3000);
                            }else{
                                toastr.error(data.message);
                                setTimeout(() => {
                                    $('#firstname').removeAttr('disabled', 'disabled');
                                    $('#lastname').removeAttr('disabled', 'disabled');
                                    $('#email').removeAttr('disabled', 'disabled');
                                    $('#email').removeClass('border-green-400');
                                    $('#email').removeClass('focus:border-green-400');
                                    $('#email').addClass('border-red-700');
                                    $('#email').addClass('focus:border-red-700');
                                    $('#password').removeAttr('disabled', 'disabled');
                                    $('#registerBtn').addClass('hover:bg-blue-800');
                                    $('#registerBtn').removeClass('disabled:opacity-25');
                                    $('#registerBtn').removeAttr('disabled','disabled');
                                    $('#registerBtn').removeClass('cursor-not-allowed');
                                    $('#registerBtn').html('Register');
                                }, 2000);
                            }
                        }
                    })
                }
            });

            $('#firstname').keyup(function() {
                if(this.value.length >=2 ){
                    fn = 1;
                    $('#fnError').html('<p class="pt-1 text-red-600 font-normal"></p>');
                    $(this).removeClass('border-gray-400');
                    $(this).removeClass('focus:border-gray-700');
                    $(this).addClass('border-green-400');
                    $(this).addClass('focus:border-green-400');
                }else{
                    fn = 0;
                    $('#fnError').html('<p class="pt-1 text-red-600 font-normal">The first name must have 2 or more letters</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
                if(firstname === null){
                    fn = 0;
                    $('#fnError').html('<p class="pt-1 text-red-600 font-normal">The first name must have 21 or more letters</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
            });

            $('#lastname').keyup(function() {
                if(this.value.length >=2 ){
                    ln = 1;
                    $('#lnError').html('<p class="pt-1 text-red-600 font-normal"></p>');
                    $(this).removeClass('border-gray-400');
                    $(this).removeClass('focus:border-gray-700');
                    $(this).addClass('border-green-400');
                    $(this).addClass('focus:border-green-400');
                }else{
                    ln = 0;
                    $('#lnError').html('<p class="pt-1 text-red-600 font-normal">The last name must have 2 or more letters</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
                if(firstname === null){
                    ln = 0;
                    $('#lnError').html('<p class="pt-1 text-red-600 font-normal">The last name must have 2 or more letters</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
            });

            $('#email').keyup(function(e){
                var validEmail = /[a-zA-Z0-9._]+@(gmail|yahoo|myyahoo|outlook|hotmail|aol)+.[a-z-A-z]{2,}/.test(this.value) && this.value.length;
                if(validEmail){
                    ea = 1;
                    $('#emailError').html('');
                    $(this).removeClass('border-gray-400');
                    $(this).removeClass('focus:border-gray-700');
                    $(this).removeClass('border-red-700');
                    $(this).removeClass('focus:border-red-700');
                    $(this).addClass('border-green-400');
                    $(this).addClass('focus:border-green-400');
                }else{
                    ea = 0;
                    $('#emailError').html(validEmail ? '':'<p class="pt-1 text-red-600 font-normal">Invalid email address</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
            });

            $('#password').keyup(function() {
                if(this.value.length >=2 ){
                    pw = 1;
                    $('#pwError').html('<p class="pt-1 text-red-600 font-normal"></p>');
                    $(this).removeClass('border-gray-400');
                    $(this).removeClass('focus:border-gray-700');
                    $(this).addClass('border-green-400');
                    $(this).addClass('focus:border-green-400');
                }else{
                    pw = 0;
                    $('#pwError').html('<p class="pt-1 text-red-600 font-normal">The password must have 2 or more characters</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
                if(firstname === null){
                    pw = 0;
                    $('#pwError').html('<p class="pt-1 text-red-600 font-normal">The password must have 21 or more characters</p>');
                    $(this).removeClass('border-green-400');
                    $(this).removeClass('focus:border-green-400');
                    $(this).addClass('border-gray-400');
                    $(this).addClass('focus:border-gray-700');
                }
            });
        });

        var alpha = "[A-Za-z ]";
        var numeric = "[0-9]";
        var alphanumeric = "[A-Za-z0-9 ]";
        var date = "[0-9/ ]";

        function validateKeypress(validChars) { 
            var validChars = new RegExp(validChars);
            var keyChar = String.fromCharCode(event.which || event.keyCode); 
            return validChars.test(keyChar) ? keyChar : false; 
        }
    </script>
    <script type="module">
        toastr.options ={
            "closeButton" : true,
            "timeOut" : 2000,
            "progressBar" : true,
            "positionClass" : "toast-bottom-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
        }
    </script>
</html>