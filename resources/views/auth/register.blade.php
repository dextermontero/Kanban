
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Email Address -->
        <div class="mt-4">
            <label for="email"></label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password"></label>

            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="">

            </a>
            <button type="submit" class="ms-4">
                Register
            </button>
        </div>
    </form>
