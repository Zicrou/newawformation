

import Alpine from 'alpinejs';
import './cart';
import './like';
import './panier';
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




