document.querySelector('.edit.delete').addEventListener('click', function (e) {
    if (!confirm(document.documentElement.getAttribute('lang')=="fr" ? "Voulez-vous vraiment supprimer votre compte ?\nCette action est irréversible." : "Do you really want to delete your account?\nThis action is irreversible.")) {
        e.preventDefault();
    }
});