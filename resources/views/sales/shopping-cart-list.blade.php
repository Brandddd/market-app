<x-app title="Market cart list">
    <section class="container">
        <shopping-cart-list :customer="{{ Auth::user() ?? null}}" />
    </section>
</x-app>
