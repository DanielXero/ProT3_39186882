
  // Alterna la visibilidad de una contraseña en un campo de entrada (input).
  function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.closest(".input-group").querySelector("i");

    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("bi-eye-fill");
      icon.classList.add("bi-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("bi-eye-slash");
      icon.classList.add("bi-eye-fill");
    }
  }

