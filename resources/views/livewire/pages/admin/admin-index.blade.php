<div>
    <div>
        @forelse ($products as $product)
            <p>{{ $product->product_name }}</p>
        @empty
        @endforelse
        @forelse ($orders as $order)
            <p>{{ $order->order_status }}</p>
        @empty
        @endforelse
        @forelse ($users as $user)
            <p>{{ $user->name }}</p>
        @empty
        @endforelse
    </div>
</div>
