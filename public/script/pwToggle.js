function togglePassword(inputId, togglerId) {
    const input = document.getElementById(inputId);
    const toggler = document.getElementById(togglerId);
    if (input.type === "password") {
        input.type = "text";
        toggler.classList.remove("fa-eye");
        toggler.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        toggler.classList.remove("fa-eye-slash");
        toggler.classList.add("fa-eye");
    }
}