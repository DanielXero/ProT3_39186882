<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>

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

            <form method="POST" action="<?= base_url('login/auth'); ?>" id="loginForm">
              <?= csrf_field(); ?>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                  id="email" name="email" value="<?= old('email') ?>" required>
                <?php if (session('errors.email')): ?>
                  <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                  </div>
                <?php endif ?>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                  <input type="password"
                    class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                    id="password"
                    name="password"
                    value="<?= old('password') ?>"
                    required>
                  <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                    <i class="bi bi-eye-fill"></i>
                  </button>
                  <?php if (session('errors.password')): ?> <div class="invalid-feedback">
                      <?= session('errors.password') ?> </div>
                  <?php endif ?>
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


<!-- Fin del contenido original -->
<?php echo $this->endSection(); ?>