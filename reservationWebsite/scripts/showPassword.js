document.querySelectorAll(".hide-show").forEach((bouton) => {
    bouton.addEventListener("click", function () {
        const input = this.parentElement.querySelector("input");
        if (input.type === "password") {
            input.type = "text";
            this.querySelector('span').textContent = "Cacher le mot de passe";
            this.classList.add('displayed')
        } else {
            input.type = "password";
            this.querySelector('span').textContent = "Afficher le mot de passe";
            this.classList.remove('displayed')
        }
    });
});