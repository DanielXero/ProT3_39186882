<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>

<div class="container py-5">
    <h1 class="mb-4 text-center">Editar Usuario</h1>

    <!-- Mensajes Flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error') || !empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <?php if (!empty($errors)): // Si hay errores del modelo guardados en $errors ?>
                <?php foreach ($errors as $error): ?>
                    <div><?= esc($error) ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow">
                <div class="card-body p-5">

                    <!-- Formulario -->
                    <!-- El action apunta al controlador que procesará la actualización -->
                    <form method="POST" action="<?= site_url('usuarios/actualizar'); ?>" id="editUserForm">
                        <?= csrf_field(); ?>
                        <!-- Campo oculto para el ID del usuario -->
                        <input type="hidden" name="id_usuario" value="<?= esc($usuario->id_usuario) ?>">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control <?= session('errors.nombre') ? 'is-invalid' : '' ?>"
                                    id="nombre" name="nombre" value="<?= old('nombre', esc($usuario->nombre)) ?>" required>
                                <?php if (session('errors.nombre')): ?>
                                    <div class="invalid-feedback"> <?= session('errors.nombre') ?> </div>
                                <?php endif ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control <?= session('errors.apellido') ? 'is-invalid' : '' ?>"
                                    id="apellido" name="apellido" value="<?= old('apellido', esc($usuario->apellido)) ?>" required>
                                <?php if (session('errors.apellido')): ?>
                                    <div class="invalid-feedback"> <?= session('errors.apellido') ?> </div>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                                id="email" name="email" value="<?= old('email', esc($usuario->email)) ?>" required>
                            <?php if (session('errors.email')): ?>
                                <div class="invalid-feedback"> <?= session('errors.email') ?> </div>
                            <?php endif ?>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control <?= session('errors.telefono') ? 'is-invalid' : '' ?>"
                                id="telefono" name="telefono" value="<?= old('telefono', esc($usuario->telefono)) ?>">
                            <?php if (session('errors.telefono')): ?>
                                <div class="invalid-feedback"> <?= session('errors.telefono') ?> </div>
                            <?php endif ?>
                        </div>

                        <!-- Sección de Password (Opcional para la edición) -->
                        <p class="text-muted mt-4 mb-2">Deje los campos de contraseña vacíos si no desea cambiarlos.</p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <div class="input-group">
                                <input type="password"
                                    class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                                    id="password"
                                    name="password"
                                    value="<?= old('password') ?>"
                                    >
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <?php if (session('errors.password')): ?>
                                <div class="invalid-feedback d-block"> <?= session('errors.password') ?> </div>
                            <?php endif ?>
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirmar Nueva Contraseña</label>
                            <div class="input-group">
                                <input type="password"
                                    class="form-control <?= session('errors.confirmPassword') ? 'is-invalid' : '' ?>"
                                    id="confirmPassword"
                                    name="confirmPassword"
                                    value="<?= old('confirmPassword') ?>"
                                    >
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <?php if (session('errors.confirmPassword')): ?>
                                <div class="invalid-feedback d-block"> <?= session('errors.confirmPassword') ?> </div>
                            <?php endif ?>
                        </div>
                        <!-- Fin Sección Password -->

                        <!-- Aquí no se muestra el checkbox de términos -->

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary w-100 btn-lg">Actualizar Usuario</button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <!-- Botón para volver al listado -->
                                <a href="<?= site_url('/usuarios') ?>" class="btn btn-secondary w-100 btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
