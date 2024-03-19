document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault();
    if (document.querySelector("input[name='password']").value !== document.querySelector("input[name='passwordCheck']").value) {
        document.querySelector(".error.hidden").classList.remove("hidden");
        document.querySelector("input[name='passwordCheck").focus();
        return;
    }
    else {
        this.submit();
    }
});

document.querySelector("input[name='login']").addEventListener("change", function() {
    document.querySelector("input[name='login']+.error").style.display = "none";
});