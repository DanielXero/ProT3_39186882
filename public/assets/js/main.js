// Ejecuta el código cuando el HTML ha cargado completamente.
document.addEventListener("DOMContentLoaded", function () {
  // Gestiona la funcionalidad de autocompletado para el campo de búsqueda.
  const searchInput = document.getElementById("searchInput");
  const resultsBox = document.getElementById("autocompleteResults");

   // Muestra/oculta resultados de autocompletado mientras el usuario escribe.
  searchInput.addEventListener("input", function () {
    const query = this.value.trim();

    if (query.length > 0) {
      // Simular resultados
      resultsBox.innerHTML = `
        <div class="p-2 hover-bg-light cursor-pointer">Resultado 1</div>
        <div class="p-2 hover-bg-light cursor-pointer">Resultado 2</div>
        <div class="p-2 hover-bg-light cursor-pointer">Resultado 3</div>
      `;
      resultsBox.classList.remove("d-none");
      resultsBox.classList.add("show");
    } else {
      resultsBox.classList.remove("show");
      setTimeout(() => resultsBox.classList.add("d-none"), 300);
    }
  });

  // Oculta los resultados del autocompletado si se hace clic fuera del área de búsqueda.
  document.addEventListener("click", function (e) {
    if (!resultsBox.contains(e.target) && e.target !== searchInput) {
      resultsBox.classList.remove("show");
      setTimeout(() => resultsBox.classList.add("d-none"), 300);
    }
  });
});

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

// Validaciones adicionales antes de enviar el formulario de registro
document.addEventListener("DOMContentLoaded", function () {
  // Valida el formulario de registro y muestra un modal de éxito al enviar.
  const form = document.getElementById("registerForm");

  if (form) {
    // Previene el envío por defecto, valida campos y muestra modal o errores.
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      let isValid = true;

      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      const errorDiv = document.getElementById("confirmPasswordError");

      if (password !== confirmPassword) {
        e.preventDefault();
        errorDiv.style.display = "block";
        document.getElementById("confirmPassword").classList.add("is-invalid");
        isValid = false;
      } else {
        document
          .getElementById("confirmPassword")
          .classList.remove("is-invalid");
        errorDiv.style.display = "none";
      }

      // Validación de contraseña con regex
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
      if (!passwordRegex.test(password)) {
        e.preventDefault();
        document.querySelector("#password + .invalid-feedback").style.display =
          "block";
        document.getElementById("password").classList.add("is-invalid");
        isValid = false;
      }

      // Mostrar modal solo si es válido
      if (isValid) {
        const successModal = new bootstrap.Modal(
          document.getElementById("registroExitosoModal")
        );
        successModal.show();

        // Redirigir después de 3 segundos
        setTimeout(() => {
          window.location.href = "/ProT2_39186882/"; // Cambia por la URL deseada
        }, 3000); // 3000 ms = 3 segundos
      }
    });
  } else {
    console.error("No se encontró el formulario con id='registerForm'");
  }
});


document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loginForm");

  if (form) {
    // Previene el envío por defecto y muestra un toast de mantenimiento.
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const toast = new bootstrap.Toast(
        document.getElementById("mantenimientoToast")
      );
      toast.show();
      setTimeout(() => {
        window.location.href = "/ProT2_39186882/"; // Cambia por la URL deseada
      }, 3000);
    });
  } else {
    console.error("No se encontró el formulario");
  }
});
