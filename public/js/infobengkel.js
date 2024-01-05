
function filterProducts() {
    var input = document.getElementById('searchInput');
    var filter = input.value.toUpperCase();

    var productsContainer = document.getElementById('productsContainer');
    var products = productsContainer.getElementsByClassName('border');
    for (var i = 0; i < products.length; i++) {
        var product = products[i];
        var title = product.querySelector('h2');
        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    }
}
