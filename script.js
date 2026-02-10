// Add event listener to add to cart button
document.addEventListener('DOMContentLoaded', function() {
    const addToCartButton = document.querySelector('input[type="submit"][value="Add to Cart"]');
    if (addToCartButton) {
        addToCartButton.addEventListener('click', function(event) {
            event.preventDefault();
            const productId = document.querySelector('input[name="id"]').value;
            const quantity = document.querySelector('input[name="quantity"]').value;
            fetch('cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${productId}&quantity=${quantity}`
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error(error));
        });
    }
});