const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container_box = document.querySelector(".container_box");

sign_up_btn.addEventListener("click", () => {
    container_box.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container_box.classList.remove("sign-up-mode");
});
