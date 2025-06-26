<!-- Login -->

<section class="py-5">
  <div class="container">
     <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card shadow">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h2 class="fw-bold">Iniciar Sesión</h2>
              <p class="text-muted">Accede a tu cuenta ZhenNova</p>
            </div>

            <form id="loginForm">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" required>
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                    <i class="bi bi-eye-fill"></i>
                  </button>
                </div>
              </div>

              <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="recordar">
                  <label class="form-check-label" for="recordar">
                    Recordarme
                  </label>
                </div>
                <a href="#" class="text-primary text-decoration-none">¿Olvidaste tu contraseña?</a>
              </div>



              <div class="row">
                <div class="col-md-6 mb-3">
                  <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">Iniciar Sesión</button>
                </div>
                <div class="col-md-6 mb-3">
                  <button type="reset" class="btn btn-danger w-100 btn-lg mb-3">Cancelar</button>
                </div>
              </div>

              <div class="text-center">
                <p class="mb-0">¿No tienes cuenta? <a href="<?= site_url('/registro') ?>" class="text-primary text-decoration-none">Regístrate aquí</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- Toast de mantenimiento -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
  <div id="mantenimientoToast" class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <strong>🚧 En mantenimiento</strong><br>
        El inicio de sesión está temporalmente deshabilitado. Vuelve más tarde.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>



