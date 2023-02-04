<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="main-cont flex items-center justify-center w-full">
        <div class="main-sect w-full">
            <div class="main grid grid-cols-2">
                <div class="left-sect flex flex-col justify-between mb-6">
                    <div class="logo-cont flex items-center pr-2 m-6 w-fit"
                        class="icon-cont bg-[#D5CEA3] p-1 rounded-lg mr-2 hover:bg-[#1A120B] transition-color duration-300">
                        <i class="fa-solid fa-circle-arrow-left w-8 h-auto text-white"></i><span></span>
                    </div>
                    <div class="content-cont mx-48">
                        <div class="title-cont flex flex-col"><span class="text-3xl font-semibold">Hi! Welcome
                                Back</span><span class="text-gray-400">Please enter your credential below to
                                login</span></div>
                        <div class="divider-cont">
                            <div class="relative flex my-4 items-center">
                                <div class="flex-grow">
                                    <x-jet-validation-errors class="mb-4" />
                                </div>
                            </div>
                        </div>
                        <div class="form-cont">
                            <div class="form">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="email" value="{{ __('Email') }}"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Email</label>
                                        <input type="email" id="email" name="email" required
                                            :value="old('email')" autofocus
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" value="{{ __('Password') }}"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Password</label>
                                        <input type="password" id="password" name="password" required
                                            autocomplete="current-password"
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="help-cont mb-4 flex justify-between">
                                        <div class="remember-cont flex">
                                            <div class="flex items-center h-5"><input type="checkbox" id="remember_me"
                                                    name="remember" value=""
                                                    class="w-2 h-2 p-2 appearance-none bg-gray-50 checked:bg-[#6D9886] border rounded-md border-[#393E46]">
                                            </div>
                                            <label for="remember"
                                                class="ml-2 text-sm font-medium text-[#223843]">{{ __('Remember me') }}</label>
                                        </div>
                                        <div
                                            class="forgot-cont ml-2 text-sm font-medium text-[#223843] underline cursor-pointer">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-gray-50 bg-[#6D9886] hover:bg-[#393E46] focus:ring-4 focus:outline-none focus:ring-[#393E46] font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center transition-color duration-300 ease-in-out">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="signup-cont text-sm mt-6">
                            <p class="text-center">Don't have an account? <a href="/register"
                                    class="font-semibold underline cursor-pointer">Sign
                                    up for
                                    free!</a></p>
                        </div>
                    </div>
                    <div class="filter-cont"><span class="hidden">filter</span></div>
                </div>
                <div class="right-sect">
                    <img src="https://images.pexels.com/photos/1137745/pexels-photo-1137745.jpeg" alt=""
                        class="min-h-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
