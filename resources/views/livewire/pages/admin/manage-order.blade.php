<div>
    <div class="container mx-auto h-full py-10">
        <div class="overflow-x-auto relative shadow-md sm:rounded">
            <h1 class="text-center text-2xl text-gray-700 py-5">Manage Order</h1>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-gray-700 uppercase text-center">
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">No.</th>
                        <th scope="col" class="py-3 px-6">Order Number</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Payment Method</th>
                        <th scope="col" class="py-3 px-6">Payment Status</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Total Price</th>
                        <th scope="col" class="py-3 px-6">Total Quantity</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Order Status</th>
                        <th scope="col" class="py-3 px-6">Order Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $index => $order_item)
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-center">
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $index + 1 }}</td>
                            <td scope="col" class="py-4 px-6 text-gray-900">{{ $order_item->id }}</td>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                {{ $order_item->payment_type }}</td>
                            <td scope="col" class="py-3 px-6">{{ $order_item->payment_status }}</td>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                {{ $order_item->total_price }}</td>
                            <td scope="col" class="py-3 px-6">{{ $order_item->total_quantity }}</td>
                            <td scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                {{ $order_item->order_status }}</td>
                            <td scope="col" class="py-3 px-6"><button type="button"
                                    wire:click='orderDetail({{ $order_item->id }})'
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Order
                                    Detail</button></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" scope="row" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">1.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
