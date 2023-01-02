<x-app title="Market cart list">
    <section class="container mt-5">
        <shopping-cart-list :customer="{{ Auth::user() ?? null}}" />
    </section>
</x-app>
