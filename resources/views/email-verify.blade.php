<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <form class="mb-4 p-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('id') }}" >
                    <div class="mb-2">
                        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                    </div>
                    <button type="submit" id="resendBtn" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">Resend Verification</button>
                    <div class="flex justify-start items-center px-1 mt-2">
                        <span class="text-gray-300">Already have an account? <a href="{{ route('home') }}" class="text-gray-200 font-bold hover:text-gray-600">Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $('#resendBtn').click(function(e) {
                e.preventDefault();
                var url_id = "{{ request()->route('id') }}";
                var url = "{{ route('email.resend',':id') }}";
                url = url.replace(':id', url_id);
                var token = $('input[type=hidden]').val();
                $(this).html('<i class="fas fa-spinner fa-spin"></i> Resend Verification');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: token,
                        id: url_id
                    },
                    beforeSend: function(){
                        $('#resendBtn').attr('disabled', 'disabled');
                        $('#resendBtn').removeClass('hover:bg-blue-800');
                        $('#resendBtn').addClass('disabled:opacity-25');
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            toastr.success(data.message);
                            setTimeout(() => {
                                window.location = data.url
                            }, 3000);
                        }else if(data.status === "info"){
                            toastr.info(data.message);
                        }else{
                            toastr.error(data.message);
                        }
                        setTimeout(() => {
                            $('#resendBtn').html('Resend Verification');
                            $('#resendBtn').removeAttr('disabled', 'disabled');
                            $('#resendBtn').addClass('hover:bg-blue-800');
                            $('#resendBtn').removeClass('disabled:opacity-25');
                        }, 3000);
                    }
                });
            });
        });
    </script>
    <script type="module">
        toastr.options ={
           "closeButton" : true,
           "progressBar" : true,
           "timeOut" : 2000,
           "positionClass" : "toast-bottom-right",
           "preventDuplicates": false,
           "showDuration": "300",
           "hideDuration": "1000",
       }
       </script>
</html>