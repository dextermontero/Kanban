<nav class="fixed top-0 z-50 w-full bg-gray-800 border-b border-gray-700 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg xl:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a href="{{ route('auth.dashboard') }}" class="flex ms-2 md:me-24">
                    <img src="" class="h-8 me-3" alt="">
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-gray-100">Kanban Board</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center mr-3">
                    @if (Auth::check())
                    @php
                        $user = \App\Models\UsersInformation::select('profile_img', 'firstname', 'lastname', 'position')->where('uid', Auth::id())->first();
                    @endphp
                    <div class="mr-3">
                        <button class="py-3 px-4 text-gray-100 hover:bg-gray-200 hover:text-gray-700 rounded-lg">
                            <i class="fa-solid fa-bell"></i>
                        </button>
                    </div>
                    <div class="mr-3">
                        <button class="py-3 px-4 text-gray-100 hover:bg-gray-200 hover:text-gray-700 rounded-lg">
                            <i class="fa-solid fa-sun"></i>
                        </button>
                    </div>
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/profiles/'.$user->profile_img) }}" alt="{{ Str::ucfirst($user->firstname) }} {{ Str::ucfirst($user->lastname) }}">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Str::ucfirst($user->firstname) }} {{ Str::ucfirst($user->lastname) }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            @if ($user->position !== 'member')
                                <li>
                                    <a href="{{ route('auth.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                </li>
                            @endif
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</button>
                                </form>
                               
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
<x-sidebar></x-sidebar>