

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {

    const counters = document.querySelectorAll(".counter");

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (!entry.isIntersecting) return;

            const counter = entry.target;

            const target = +counter.dataset.target;

            let value = 0;

            const step = Math.ceil(target / 120);

            const update = () => {

                value += step;

                if (value >= target) {

                    value = target;

                }

                if (target >= 1000) {

                    counter.textContent =
                        value.toLocaleString("fr-FR") + "+";

                } else {

                    counter.textContent = value + "+";

                }

                if (value < target) {

                    requestAnimationFrame(update);

                }

            };

            update();

            observer.unobserve(counter);

        });

    });

    counters.forEach(counter => observer.observe(counter));

});
// document.addEventListener("DOMContentLoaded", () => {

//     document.querySelectorAll('.add-to-cart').forEach(button => {


//     button.addEventListener('click', async function (event) {
//         event.preventDefault();
//         event.stopPropagation();


//         const courseId = this.dataset.course;
//         const url = this.dataset.url;

//         console.log(this.dataset.url);
//         console.log('URL appelée :', button.dataset.url);
//         console.log('Course :', button.dataset.course);
//         const response = await fetch(this.dataset.url, {
//             method: "POST",
//             headers: {
//                 "Accept": "application/json",
//                     "X-CSRF-TOKEN": document
//                         .querySelector('meta[name="csrf-token"]')
//                         .content
//             },
//             body: JSON.stringify({
//                 courId: courseId
//             })
//         });
//         const text = await response.text();

//         console.log(text);



        // // Mise à jour compteur panier
        // const cartCount = document.getElementById('cart-count');

        // cartCount.textContent = data.cartCount;



        // // Animation badge

        // cartCount.classList.remove('cart-animation');


        // void cartCount.offsetWidth;


        // cartCount.classList.add('cart-animation');




        // // Changement bouton

        // if(data.status === "added"){


        //     this.innerHTML = "✓ Ajouté";


        //     this.classList.remove(
        //         "bg-indigo-600"
        //     );


        //     this.classList.add(
        //         "bg-green-600"
        //     );


        // }



        // // Afficher toast

        // showToast(
        //     data.status === "added"
        //     ? "Cours ajouté au panier"
        //     : "Ce cours est déjà dans votre panier"
        // );


//     });

//     });


// });



function showToast(message){


    const toast = document.getElementById('toast');

    const text = document.getElementById('toast-message');


    text.textContent = message;


    toast.classList.remove(
        "hidden",
        "translate-x-full"
    );


    toast.classList.add(
        "translate-x-0"
    );



    setTimeout(()=>{


        toast.classList.remove(
            "translate-x-0"
        );


        toast.classList.add(
            "translate-x-full"
        );


        setTimeout(()=>{

            toast.classList.add("hidden");

        },300);


    },3000);
}
document.addEventListener("DOMContentLoaded", function () {
        
        // const cartCountElement = document.getElementById("cart-count");
        // if (window.cartCount <= 0) {

        //     const cartContainer = document.getElementById("card-container");
        //     const emptyCart = document.getElementById("empty-cart");

        //     if (cartContainer) {
        //         cartContainer.classList.add("hidden");
        //     }

        //     if (emptyCart) {
        //         emptyCart.classList.remove("hidden");
        //     }
        // }

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
