
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.like-btn').forEach(button => {

        button.addEventListener('click', async function () {

            const response = await fetch(this.dataset.url, {
                method: 'POST'})
            const data = await response.json();
                if(data.message == "Please log in first."){
                    alert("Veuillez vous connecté svp")
                }

            const heart = this.querySelector('.heart');
            
            console.log("We're here");
            const likes = document.getElementById('likes-count');

            if (data.status === 'liked') {

                heart.classList.remove('text-gray-500');
                heart.classList.add('text-red-500');

                likes.textContent = data.likesCount;

            } else {

                heart.classList.remove('text-red-500');
                heart.classList.add('text-gray-500');

                likes.textContent = data.likesCount;
            }
                // });
                
                
                

        });
    });
});