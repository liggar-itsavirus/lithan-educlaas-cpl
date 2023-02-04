<div>
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-44"
        style="background-image: url('https://images.wallpaperscraft.com/image/single/coffee_beans_food_surface_91913_1920x1080.jpg');">
        <div class="container mx-auto">
            <h1 class="text-6xl text-[#E5E5CB] font-extrabold mb-4 leading-none">
                Bite and Beans <br> Coffee Online Store
            </h1>
            <p class="text-2xl text-[#E5E5CB]">Now, buying your preferred coffee is simpler.</p>
            <div class="mt-12">
                <a href="/login"
                    class="border border-[#3C2A21] bg-[#E5E5CB] text-[#3C2A21] px-8 py-3 font-medium
                     rounded-md hover:bg-transparent hover:bg-[#3C2A21] hover:text-[#E5E5CB] hover:border-[#E5E5CB]">Shop
                    Now</a>
            </div>
        </div>
    </div>
    <!-- banner -->
    <div class="container mx-auto">
        <!-- features -->
        <div class="container py-16">
            <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
                <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                    <i class="fa-solid fa-box fa-2xl"></i>
                    <div>
                        <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                        <p class="text-gray-500 text-sm">Free shipping for order more then $100</p>
                    </div>
                </div>
                <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                    <i class="fa-solid fa-shield-halved fa-2xl"></i>
                    <div>
                        <h4 class="font-medium capitalize text-lg">Secure Payment System</h4>
                        <p class="text-gray-500 text-sm">The Payment method will guaranteed encrypted</p>
                    </div>
                </div>
                <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                    <div class="">
                        <i class="fa-solid fa-repeat fa-2xl"></i>
                    </div>
                    <div>
                        <h4 class="font-medium capitalize text-lg">Refund & Return</h4>
                        <p class="text-gray-500 text-sm">Guaranteed products according to the order</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./features -->

        <!-- categories -->
        <div class="container py-16">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">From Our Coffee Shop</h2>
            <div class="grid grid-cols-3 gap-3">
                <div class="relative rounded-sm overflow-hidden group">
                    <div class="w-full h-32"></div>
                    <a href="#"
                        class="w-full h-32 absolute inset-0 bg-[#3C2A21] bg-opacity-40 flex items-center justify-center text-xl text-gray-800 font-roboto font-medium group-hover:bg-opacity-60 transition">Coffee
                        Beans</a>
                </div>
                <div class="relative rounded-sm overflow-hidden group">
                    <div class="w-full h-32"></div>
                    <a href="#"
                        class="w-full h-32 absolute inset-0 bg-[#3C2A21] bg-opacity-40 flex items-center justify-center text-xl text-gray-800 font-roboto font-medium group-hover:bg-opacity-60 transition">Brewing
                        Kit</a>
                </div>
                <div class="relative rounded-sm overflow-hidden group">
                    <div class="w-full h-32"></div>
                    <a href="#"
                        class="w-full h-32 absolute inset-0 bg-[#3C2A21] bg-opacity-40 flex items-center justify-center text-xl text-gray-800 font-roboto font-medium group-hover:bg-opacity-60 transition">Membership</a>
                </div>
            </div>
        </div>
        <!-- ./categories -->

        <!-- new arrival -->
        <div class="container pb-16">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
            <div class="grid grid-cols-4 gap-6">
                @forelse ($coffeeBeans as $bean)
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $bean->product_image) }}" alt="product 1"
                                class="w-full py-3">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <div wire:click="showProductDetails({{ $bean->id }})"
                                    class="text-gray-300 text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition cursor-pointer"
                                    title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <a href="#"
                                    class="text-gray-300 text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition cursor-pointer"
                                    title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <div wire:click="showProductDetails({{ $bean->id }})">
                                <h4
                                    class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition cursor-pointer">
                                    {{ $bean->product_name }}
                                </h4>
                            </div>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">
                                    ${{ number_format($bean->product_price, 2) }}
                                </p>
                                <p class="text-sm text-gray-400 line-through">
                                    ${{ number_format($bean->product_price * 1.2, 2) }}
                                </p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
                            </div>
                        </div>
                        <a href="#"
                            class="block w-full py-1 text-center text-gray-800 bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <!-- ./new arrival -->

        <!-- product -->
        <div class="container pb-16">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
            <div class="grid grid-cols-4 gap-6">
                @forelse ($brewingKit as $kit)
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $kit->product_image) }}" alt="product 1" class="py-0.5">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <div wire:click="showProductDetails({{ $kit->id }})"
                                    class="text-gray-300 text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition cursor-pointer"
                                    title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <a href="#"
                                    class="text-gray-300 text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition cursor-pointer"
                                    title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <div wire:click="showProductDetails({{ $kit->id }})">
                                <h4
                                    class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition cursor-pointer">
                                    {{ $kit->product_name }}</h4>
                            </div>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">
                                    ${{ number_format($kit->product_price, 2) }}
                                </p>
                                <p class="text-sm text-gray-400 line-through">
                                    ${{ number_format($kit->product_price * 1.2, 2) }}
                                </p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
                            </div>
                        </div>
                        <a href="#"
                            class="block w-full py-1 text-center text-gray-800 bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <!-- ./product -->
    </div>

    <x-jet-dialog-modal wire:model="productDetailModal" maxWidth="4xl" class="flex items-center">
        <x-slot name="title" class="text-5xl">
            Product Detail
            <div class="cursor-pointer" wire:click="$toggle('productDetailModal')">
                <i class="fa-solid fa-close fa-xl"></i>
            </div>
        </x-slot>

        <x-slot name="content">
            @if (isset($productDetail))
                <div class="flex gap-7">
                    <div class="w-full sm:w-96 md:w-8/12 lg:w-6/12 items-center">
                        <h6
                            class="font-semibold lg:text-2xl text-xl lg:leading-9 leading-7 text-gray-800 dark:text-white mt-4">
                            {{ $productDetail->product_name }}
                        </h6>
                        <div class="flex flex-row items-center justify-between mt-5">
                            <div>
                                <span class="fa fa-star text-yellow-400"></span>
                                <span class="fa fa-star text-yellow-400"></span>
                                <span class="fa fa-star text-yellow-400"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 font-normal text-base leading-4 text-gray-700 hover:underline hover:text-gray-800 dark:text-white duration-100 cursor-pointer">
                                22 reviews</p>
                        </div>
                        <p class="font-normal text-base leading-6 text-gray-600  mt-7">
                            {{ $productDetail->product_description }}
                        </p>
                        <div class="flex justify-between items-center">
                            <p class="font-semibold lg:text-2xl text-xl lg:leading-6 leading-5 mt-6 dark:text-white">$
                                {{ $productDetail->product_price }}</p>
                            <p>Stock available: {{ $productDetail->product_quantity }}</p>
                        </div>
                        <button wire:click="$toggle('addOrderModal')"
                            class="focus:outline-none focus:ring-2 hover:bg-black focus:ring-offset-2 focus:ring-gray-800 font-medium text-base leading-4 text-white bg-gray-800 w-full py-5 lg:mt-12 mt-6 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100">Order</button>
                    </div>
                    <div class=" sm:w-96 md:w-8/12 lg:w-6/12 flex lg:flex-row flex-col lg:gap-8 sm:gap-6 gap-4">
                        <img src="{{ asset('storage/' . $productDetail->product_image) }}"
                            alt="Product: {{ $productDetail->product_name }}" />
                    </div>
                </div>
            @endif
        </x-slot>

    </x-jet-dialog-modal>

</div>
