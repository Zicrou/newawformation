// Ajout d'une ligne dans le panier
import { showToast } from "./toast";
document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".add-to-cart").forEach(button => {

        button.addEventListener("click", async function () {
            if(this.dataset.authenticated == false){
                alert("Vous devez vous connecter d'abord");
            }
            try {
                const response = await fetch(this.dataset.url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .content
                },
                body: JSON.stringify({
                    courId: this.dataset.course
                })
            });

            const data = await response.json();

                if (data.status === "added") {

                    this.innerHTML = "✓ Ajouté";

                    this.classList.remove("bg-white");
                    this.classList.add("bg-green-600");

                }

                const badge = document.getElementById("cart-count");

                if (badge) {
                    badge.textContent = data.cartCount;
                }
                
                showToast(data.status === "added"
                        ? "Cours ajouté au panier."
                        : "Ce cours est déjà dans votre panier.")

            } catch (e) {

                console.error(e);

            }
            

        });

    });

});

// Suppression d'une ligne du panier

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.remove-cart-item').forEach(button => {
  
        button.addEventListener('click', async function () {

            console.log("Bouton supprimer cliqué");
            if (!confirm("Supprimer ce cours du panier ?")) {
                return;
            }
            const response = await fetch(this.dataset.url, {
                method: "DELETE",
                headers: {
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .content
                }
            });

            const data = await response.json();

            console.log(data);
            if (data.success) {

                const row = document.getElementById(
                    `cart-item-${this.dataset.id}`
                );

                // Animation
                row.classList.add(
                    "opacity-0",
                    "translate-x-10",
                    "transition-all",
                    "duration-300"
                );

                setTimeout(() => {
                    row.remove();
                    // 
                    if (data.cartCount === 0) {
                        
                        document.getElementById("card-container").classList.add("hidden");

                        document.getElementById("empty-cart").classList.remove("hidden");

                    }

                }, 300);
                
                // Mettre à jour le compteur du panier
                const badge = document.getElementById("cart-count");
                
                if (badge) {
                    badge.textContent = data.cartCount;
                }
                
                showToast("Cours supprimé du panier");

            }

        });

    });
});
