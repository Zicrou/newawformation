

import Alpine from 'alpinejs';
import './cart';
import './like';
import './panier';
import { showToast } from "./toast";

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

document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("checkout-btn")
    .addEventListener("click", async ()=>{


        let items = [];


        document.querySelectorAll(".item-checkbox:checked")
        .forEach(item=>{
            console.log(item.value);
            if(item.value){
            console.log(item.value);

                items.push(item.value);
            }

        });
        
        console.log(items);
        // Arrete le processus ici
        // return;
        if(items.length === 0){

            showToast("Sélectionnez au moins une formation");

            return;

        }



        const response = await fetch("/orders", {

            method:"POST",

            headers:{

                "Content-Type":"application/json",

                "Accept":"application/json",

                "X-CSRF-TOKEN":
                document.querySelector('meta[name="csrf-token"]').content

            },


            body:JSON.stringify({

                items:items

            })

        });



        const data = await response.json();


        console.log(data);


    });
});

