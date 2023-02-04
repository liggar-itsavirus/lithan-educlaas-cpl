<div>
    <div class="container mx-auto h-full py-10">
        <div class="overflow-x-auto relative shadow-md sm:rounded">
            <h1 class="text-center text-2xl py-5">Your Order History</h1>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-gray-700 uppercase text-center">
                    <tr>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">No</th>
                        <th scope="col" class="py-3 px-6">Order Number</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Payment Type</th>
                        <th scope="col" class="py-3 px-6">Payment Status</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Total Price</th>
                        <th scope="col" class="py-3 px-6">Total Quantity</th>
                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">Order Status</th>
                        <th scope="col" class="py-3 px-6">Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $index => $order_item)
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-center">
                            <td scope='row'
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $index + $orders->firstItem() }}</td>
                            <td class="py-4 px-6 text-gray-900">{{ $order_item->id }}</td>
                            <td scope='row'
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $order_item->payment_type }}</td>
                            <td class="py-4 px-6 text-gray-900">{{ $order_item->payment_status }}</td>
                            <td scope='row'
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $order_item->total_price }}</td>
                            <td class="py-4 px-6 text-gray-900">{{ $order_item->total_quantity }}</td>
                            <td
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $order_item->order_status }}</td>
                            <td scope='row' class="py-4 px-6 text-gray-900">
                                <button wire:click='orderDetail({{ $order_item->id }})'
                                    class="py-1 px-2 rounded-md bg-blue-300 text-blue-900 focus:ring focus:outline-none text-lg font-semibold transition-colors">
                                    Order Detail
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-lg font-medium py-4" colspan="7">No Product</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
