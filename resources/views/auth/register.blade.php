<x-guest-layout>
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
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="block mb-2 text-sm font-medium text-[#1A120B]">Full
                                            Name</label>
                                        <input type="text" id="name" name="name" required
                                            :value="old('name')" autofocus
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Email</label>
                                        <input type="email" id="email" name="email" required
                                            :value="old('email')" autofocus
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="mb-4">
                                        <label for="address"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Address</label>
                                        <input type="text" id="address" name="address" required
                                            :value="old('address')" autofocus
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="mb-4">
                                        <label for="phone"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" required
                                            :value="old('phone')" autofocus
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" value="{{ __('Password') }}"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Password</label>
                                        <input type="password" id="password" name="password" required
                                            :value="old('password')" autocomplete="new-password"
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation"
                                            class="block mb-2 text-sm font-medium text-[#1A120B]">Retype
                                            Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            required autocomplete="new-password"
                                            class="bg-gray-50 border border-[#393E46] text-[#223843] text-sm rounded-lg focus:ring-[#6D9886] focus:border-[#6D9886] block w-full p-2.5">
                                    </div>
                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="mt-4">
                                            <x-jet-label for="terms">
                                                <div class="flex items-center">
                                                    <x-jet-checkbox name="terms" id="terms" required />

                                                    <div class="ml-2">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' =>
                                                                '<a target="_blank" href="' .
                                                                route('terms.show') .
                                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                                __('Terms of Service') .
                                                                '</a>',
                                                            'privacy_policy' =>
                                                                '<a target="_blank" href="' .
                                                                route('policy.show') .
                                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                                __('Privacy Policy') .
                                                                '</a>',
                                                        ]) !!}
                                                    </div>
                                                </div>
                                            </x-jet-label>
                                        </div>
                                    @endif
                                    <button type="submit"
                                        class="text-gray-50 bg-[#6D9886] hover:bg-[#393E46] focus:ring-4 focus:outline-none focus:ring-[#393E46] font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center transition-color duration-300 ease-in-out">Register</button>
                                </form>
                            </div>
                        </div>
                        <div class="signup-cont text-sm mt-6">
                            <p class="text-center">Already have an account <a href="/register"
                                    class="font-semibold underline cursor-pointer">Sign in here!</a></p>
                        </div>
                    </div>
                    <div class="filter-cont"><span class="hidden">filter</span></div>
                </div>
                <div class="right-sect">
                    <img src="https://images.pexels.com/photos/996219/pexels-photo-996219.jpeg?auto=compress&cs=tinysrgb&w=1600"
                        alt="" class="min-h-fit h-fit object-cover">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
