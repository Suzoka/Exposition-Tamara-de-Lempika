document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault();
    if (document.querySelector("input[name='password']").value !== document.querySelector("input[name='password2']").value) {
        alert("Les mots de passe ne correspondent pas.");
        //Code erreur à afficher
        return;
    }
    else {
        this.submit();
    }
});