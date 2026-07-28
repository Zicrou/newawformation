export function showToast(message) {

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