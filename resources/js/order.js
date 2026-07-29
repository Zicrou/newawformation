import { showToast } from "./toast";
document.addEventListener("DOMContentLoaded", () => {

    const selectedContainer = document.getElementById("selected-items");
        
    document.querySelectorAll(".item-checkbox")
        .forEach(checkbox => {

            checkbox.addEventListener("change", updateSelectedItems);

        });


    function updateSelectedItems() {

    const selected = document.querySelectorAll(".item-checkbox:checked");

    console.log(selected);

    selectedContainer.innerHTML = "";

    let total = 0; // <-- Ici

    selected.forEach(item => {

        console.log(item.value);
        console.log(item.dataset.price);

        total += parseFloat(item.dataset.price.trim());
        if(total == 0)
        {

            showToast("Veuillez choisir au moins un élément");
        
        }

    });

    selectedContainer.innerHTML += `
        <div class="p-3 bg-indigo-100 rounded-lg mb-2 font-bold">
            Total : ${total.toFixed(2)} €
        </div>
    `;

}
});