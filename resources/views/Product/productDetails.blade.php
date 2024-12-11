<x-app-layout>
    <div class="page-header">
        <h2>Product Details</h2>
    </div>
    <div class="perant_2">

        <div class="container_product_details">
            <div id="product-details" class="product-details">
                <!-- Content will be dynamically inserted here by JavaScript -->
            </div>
           
            <p id="error-message"></p>
        </div>
    </div>

    <script src="{{ asset('JS/details.js') }}"></script>
    <script>
        // Extract the product ID dynamically from the route
        const productId = "{{ request()->route('product_id') }}";

        // Call the function to fetch product details
        fetchProductDetails(productId);
    </script>
</x-app-layout>