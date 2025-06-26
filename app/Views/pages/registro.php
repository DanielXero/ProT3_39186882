<!-- Registro -->
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
            <div class="col-lg-6 col-md-8">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Crear Cuenta</h2>
                            <p class="text-muted">Únete a la comunidad ZhenNova</p>
                        </div>

                        <form method="POST" action="<?= base_url('registro'); ?>" id="registerForm">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control <?= session('errors.nombre') ? 'is-invalid' : '' ?>"
                                        id="nombre" name="nombre" value="<?= old('nombre') ?>" required>
                                    <?php if (session('errors.nombre')): ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.nombre') ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control <?= session('errors.apellido') ? 'is-invalid' : '' ?>"
                                        id="apellido" name="apellido" value="<?= old('apellido') ?>" required>
                                    <?php if (session('errors.apellido')): ?>
                                        <div class="invalid-feedback">
                                            <?= session('errors.apellido') ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>

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
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control <?= session('errors.telefono') ? 'is-invalid' : '' ?>"
                                    id="telefono" name="telefono" value="<?= old('telefono') ?>" required>
                                <?php if (session('errors.telefono')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.telefono') ?>
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

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control <?= session('errors.confirmPassword') ? 'is-invalid' : '' ?>"
                                        id="confirmPassword"
                                        name="confirmPassword"
                                        value="<?= old('confirmPassword') ?>"
                                        required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <?php if (session('errors.confirmPassword')): ?> <div class="invalid-feedback">
                                            <?= session('errors.confirmPassword') ?> </div>
                                    <?php endif ?>

                                </div>                                
                            </div>





                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input <?= session('errors.terminos') ? 'is-invalid' : '' ?>"
                                    id="terminos" name="terminos" value="1" <?= old('terminos') ? 'checked' : '' ?> required>
                                <label class="form-check-label" for="terminos">
                                    Acepto los <a href="<?= site_url('/terminos-y-condiciones') ?>" class="text-primary">Términos y Condiciones</a>
                                </label>
                                <?php if (session('errors.terminos')): ?>
                                    <div class="invalid-feedback d-block">
                                        <?= session('errors.terminos') ?>
                                    </div>
                                <?php endif ?>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">Registrarse</button>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="reset" class="btn btn-danger w-100 btn-lg mb-3">Cancelar</button>
                                </div>
                            </div>



                            <div class="text-center">
                                <p class="mb-0">¿Ya tienes cuenta? <a href="<?= site_url('/login') ?>" class="text-primary text-decoration-none">Iniciar Sesión</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal de éxito -->
        <!-- <div class="modal fade" id="registroExitosoModal" tabindex="-1" aria-labelledby="registroExitosoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registroExitosoLabel">✅ Registro Exitoso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¡Bienvenido(a) a ZhenNova! Tu cuenta ha sido creada con éxito.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</section>