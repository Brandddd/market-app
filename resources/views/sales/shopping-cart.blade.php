<x-app title="Market cart">
    <section class="mt-5 container">
        <shopping-cart-preview :product_data="{{ $product }}" :customer_id="{{ Auth::user()->id ?? null}}" />
    </section>
</x-app>
