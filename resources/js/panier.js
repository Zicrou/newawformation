document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("select-all")
    .addEventListener("change", function(){

        document.querySelectorAll(".cart-item-checkbox")
        .forEach(checkbox => {

            checkbox.checked = this.checked;

        });

        updateTotal();

    });
    
});

function updateTotal(){

    let total = 0;


    document.querySelectorAll(".cart-item-checkbox:checked")
    .forEach(item => {

        total += Number(item.dataset.price);

    });


    document.getElementById("cart-total").textContent =
        total.toLocaleString("fr-FR");

}


document.querySelectorAll(".cart-item-checkbox")
.forEach(checkbox => {

    checkbox.addEventListener("change", updateTotal);

});