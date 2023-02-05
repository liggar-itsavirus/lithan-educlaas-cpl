<div>
    <div class="container mx-auto h-full py-10">
        <div class="overflow-x-auto relative shadow-md sm:rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" colspan="7" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Latest Added
                            Products</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="py-3 px-6">Index</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Product Name</th>
                        <th scope="col" class="py-3 px-6">Product Category</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Product Description</th>
                        <th scope="col" class="py-3 px-6">Product Image</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Product Price</th>
                        <th scope="col" class="py-3 px-6">Product Quantity</th>
                    </tr>
                    @forelse ($products as $index => $product)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $index + 1 }}</td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">{{ $product->product_name }}</td>
                            <td class="py-3 px-6">{{ $product->product_category }}</td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">{{ $product->product_description }}</td>
                            <td class="py-3 px-6"><img src="{{ asset('storage/' . $product->product_image) }}"
                                    width="100px" alt="Product Image"></td>
                            <td class="py-3 px-6 bg-gray-50 dark:bg-gray-800">$ {{ $product->product_price }}</td>
                            <td class="py-3 px-6">{{ $product->product_quantity }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded mt-20">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" colspan="7" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Last Order
                            placed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">No.</th>
                        <th scope="col" class="py-3 px-6">Order Number</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Payment Method</th>
                        <th scope="col" class="py-3 px-6">Payment Status</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Total Price</th>
                        <th scope="col" class="py-3 px-6">Total Quantity</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Order Status</th>
                    </tr>
                    @forelse ($orders as $index => $order)
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-center">
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $index + 1 }}</td>
                            <td scope="col" class="py-4 px-6 text-gray-900">{{ $order->id }}</td>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                {{ $order->payment_type }}</td>
                            <td scope="col" class="py-3 px-6">{{ $order->payment_status }}</td>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                {{ $order->total_price }}</td>
                            <td scope="col" class="py-3 px-6">{{ $order->total_quantity }}</td>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                {{ $order->order_status }}</td>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div>
        @forelse ($users as $user)
            <p>{{ $user->name }}</p>
        @empty
        @endforelse
    </div> --}}
</div>
