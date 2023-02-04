<div>
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10">
            <div class="w-full bg-white px-10 py-10">
                <h1 class="font-semibold text-3xl pb-5 mb-3 text-[#1A120B]">Order Detail</h1>
                <div class="flex justify-between mb-3">
                    <div class="mb-3 text-lg text-[#1A120B]">Order Number #20230117-001</div>
                    <div class="mb-3 text-lg"><i class="fa-regular fa-calendar-days text-[#1A120B]"></i> Tuesday, on
                        January 17 2023 <i class="fa-regular fa-clock"></i> 10:11 AM</div>
                </div>
                <div class="flex justify-between mb-3">
                    <div class="pr-5 mb-3">
                        <div class="w-4/6 mb-4 text-xl font-semibold text-[#1A120B]">Products</div>
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-[#1A120B] dark:text-gray-400 mb-3">
                                <thead
                                    class="text-xs text-center text-[#1A120B] uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No.</th>
                                        <th scope="col" class="px-6 py-3">Product Image</th>
                                        <th scope="col" class="px-6 py-3">Product Name</th>
                                        <th scope="col" class="px-6 py-3">Category</th>
                                        <th scope="col" class="px-6 py-3">Quantity</th>
                                        <th scope="col" class="px-6 py-3">Price</th>
                                        <th scope="col" class="px-6 py-3">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        @foreach ($order->orderDetails as $index => $orderDetail)
                                            <tr class="bg-white border-b hover:bg-gray-100 text-center text-[#1A120B]">
                                                <th scope="row"
                                                    class="py-4 px-6 font-medium    whitespace-nowrap dark:text-white dark:bg-gray-800">
                                                    {{ $index + 1 }} </th>
                                                <td class="py-4 px-6">
                                                    <img src="{{ asset('storage/' . $orderDetail->products->product_image) }}"
                                                        alt="{{ $orderDetail->products->product_name }}" width="100px">
                                                </td>
                                                <td class="py-4 px-6">{{ $orderDetail->products->product_name }}</td>
                                                <td class="py-4 px-6">{{ $orderDetail->products->product_category }}
                                                </td>
                                                <td class="py-4 px-6">{{ $orderDetail->product_quantity }}</td>
                                                <td class="py-4 px-6">${{ $orderDetail->products->product_price }}
                                                </td>
                                                <td class="py-4 px-6">${{ $orderDetail->subtotal_price }}</td>
                                            </tr>
                                        @endforeach
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="grid grid-cols-2 gap-10 pt-5">
                                <div class="">
                                    <h1 class="text-xl font-semibold mb-3 text-[#1A120B]">Summary</h1>
                                    @forelse ($orders as $order)
                                        @foreach ($order->orderDetails as $orderDetail)
                                            <div class="justify-between flex mb-3 text-[#1A120B]">
                                                <div>Sub Total</div>
                                                <div>${{ $orderDetail->subtotal_price }}</div>

                                            </div>
                                        @endforeach
                                        <div class="justify-between flex mb-3 text-[#1A120B]">
                                            <div>Shipping Fee</div>
                                            <div>$10</div>
                                        </div>
                                        <div class="justify-between flex border-t-2 border-[#1A120B] pt-3 ">
                                            <div>Total</div>
                                            <div>${{ $order->total_price }}</div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="p-3 text-[#1A120B]">
                                    <h1 class="text-xl font-semibold mb-3">Shipping</h1>
                                    <div class="flex flex-row">
                                        <div class="text-center my-5 basis-1/4 text-[#3C2A21]"><i
                                                class="fa-solid fa-truck fa-3x"></i>
                                        </div>
                                        <div class="justify-between flex basis-3/4 py-5">
                                            <div>
                                                <p>Sicepat Delivery</p>
                                                <p>Takes up to 3 working days</p>
                                            </div>
                                            <div>$10</div>
                                        </div>
                                    </div>
                                    <div class="mb-3"><button
                                            class="w-full bg-[#3C2A21] text-[#E5E5CB] hover:bg-[#3C2A21] focus:ring-4 focus:ring-[#D5CEA3] rounded-md text-sm px-5 py-2.5">View
                                            Carrier
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-2/6">
                        <div class="mb-3">
                            @forelse ($orders as $order)
                                <div class="method-payment-section">
                                    <div class="justify-between flex mb-3 border-b border-[#3C2A21] pb-5">
                                        <div class="">
                                            <p class="text-lg font-semibold">Order Status</p>
                                            <p class="text-base">Method Payment</p>
                                            <p class="text-base">Payment status</p>

                                        </div>
                                        <div class="">
                                            <p class="textlg font-semibold">{{ $order->order_status }}</p>
                                            <p class="text-base">{{ $order->payment_type }}</p>
                                            <p class="text-base">{{ $order->payment_status }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shipping-address-section">
                                    <div class="mb-3 border-b border-[#3C2A21] pb-5">
                                        <p class="text-xl font-semibold mb-3">Shipping Address</p>
                                        <p class="text-lg italic mb-1">
                                            {{ $order->address->first_name }} {{ $order->address->last_name }}</p>
                                        <p class="text-lg italic mb-1">{{ $order->address->phone_number }}</p>
                                        <p class="text-lg italic mb-1">{{ $order->address->street_address }}
                                            {{ $order->address->district }} {{ $order->address->town_city }}
                                            {{ $order->address->province }}</p>
                                        <p class="text-lg italic mb-1">{{ $order->address->postcode }}</p>
                                    </div>
                                </div>
                            @empty
                            @endforelse


                            <div class="button-section">
                                <div class="mb-3">
                                    <button type="button" wire:click='updateOrder'
                                        {{ $order->order_status != 'Delivered' ? 'disabled' : '' }}
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700  focus:outline-none dark:focus:ring-blue-800 disabled:bg-gray-500 disabled:hover:bg-gray-500">Order
                                        Received</button>
                                    <button type="button"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700  focus:outline-none dark:focus:ring-blue-800">Buy
                                        Again</button>
                                    <button type="button"
                                        class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">View
                                        E-Invoice</button>
                                    <button type="button"
                                        class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Rate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
