
<!-- Registro -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Crear Cuenta</h2>
                            <p class="text-muted">Únete a la comunidad ZhenNova</p>
                        </div>

                        <form id="registerForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Ingresa un correo válido" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" pattern="\d{7,15}" title="Solo números, entre 7 y 15 dígitos" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}" title="Mínimo 8 caracteres, una mayúscula, una minúscula y un número" required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>

                                </div>
                                <div class="invalid-feedback" id="confirmPasswordError">
                                    Las contraseñas no coinciden.
                                </div>
                            </div>





                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terminos" required>
                                <label class="form-check-label" for="terminos">
                                    Acepto los <a href="<?= site_url('/terminos-y-condiciones') ?>" class="text-primary">Términos y Condiciones</a>
                                </label>
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