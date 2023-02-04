<div>
    <div class="bg-cover bg-no-repeat bg-center py-44"
        style="background-image: url('https://preview.colorlib.com/theme/timezone/assets/img/hero/about_hero.png.webp');">
        <div class="container mx-auto text-center justify-center">
            <h1 class="text-6xl text-gray-800 font-medium uppercase mb-3">OUTLET</h1>
            <div>Here is a list of all the Bite and Beans locations nationwide. The Bite and Beans are not yet
                available in your Province or City if it is not listed.</div>
        </div>
    </div>
    <div class="mx-auto container py-8">
        <div class="flex flex-wrap justify-center items-center">
            @forelse ($outlets as $outlet_item)
                <div tabindex="0" class="mx-2 mb-8 focus:outline-none hover:shadow-xl">
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5
                            class="mb-5 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white border-gray-700 border-b-2 pb-5">
                            {{ $outlet_item->outlet_name }}</h5>
                        <p class="mb-3 font-semibold text-center text-gray-700 dark:text-gray-400">
                            {{ $outlet_item->street_address }}</p>
                        <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400">
                            {{ $outlet_item->district }}, {{ $outlet_item->town_city }},
                            {{ $outlet_item->province }}, {{ $outlet_item->postcode }}
                        </p>
                        <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400"><i
                                class="fa-solid fa-phone-volume"></i> {{ $outlet_item->phone_number }}
                        </p>
                    </div>
                </div>
            @empty
            @endforelse


        </div>
    </div>
</div>
