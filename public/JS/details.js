async function fetchProductDetails(productId) {

    const errorMessage = document.getElementById("error-message");
    const productDetailsContainer = document.getElementById("product-details");
    errorMessage.textContent = "";
    try {
 
        const response = await fetch(`/api/product/details/${productId}`, {
            method: "GET",
            headers: {
                Authorization: `Bearer 1|iysHEKZbakMsj0Xn6DkbjJe9LUEcJQIL09BnbBUb0f545c5f`,
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) throw new Error(`Error: ${response.statusText}`);

        const product = await response.json();

        productDetailsContainer.innerHTML = `
            <div class="product-header">
                <h2 id="product-name">${product.name || "Unknown Product"}</h2>
            </div>
            <div class="product-info">
                <p><strong>Price:</strong> <span id="product-price">$${product.price || "0.00"}</span></p>
                <p><strong>Quantity:</strong> <span id="product-quantity">${product.quantity || "0"}</span></p>
                <p><strong>Description:</strong> <span id="product-description">${product.description || "No description available."}</span></p>
            </div>
            
           
        `;
    } catch (error) {
        
        errorMessage.textContent = "your are not authenticated";
    }
}
