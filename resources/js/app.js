

import Alpine from 'alpinejs';
import './cart';
import './like';
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


