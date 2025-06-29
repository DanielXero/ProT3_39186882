<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>
<!-- Acerca De -->
<section class="section-acercade">
        <div class="container">
            <h2 class="section-title">Acerca de ZhenNova</h2>
            
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6">
                    <h3 class="h2 mb-4">Nuestra Empresa</h3>
                    <p class="lead">ZhenNova es una empresa especializada en la comercialización de insumos y componentes para computadoras, ofreciendo productos de las mejores marcas del mercado.</p>
                    <div class="row g-3 mt-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Productos originales</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Garantía extendida</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Soporte técnico</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                <span>Envío gratuito</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?= base_url('public/assets/img/acerca.png') ?>" class="img-fluid shadow-sm rounded" loading="lazy" alt="Nuestra tienda">
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card custom-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-cpu-fill text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">Componentes PC</h5>
                            <p class="card-text">Procesadores, tarjetas gráficas, memorias RAM, discos duros y más componentes de última generación.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card custom-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-mouse text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">Periféricos</h5>
                            <p class="card-text">Teclados, ratones, auriculares, webcams y todos los accesorios que necesitas para tu setup.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card custom-card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-tools text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">Servicio Técnico</h5>
                            <p class="card-text">Ensamblado de equipos, mantenimiento, reparaciones y asesoramiento técnico especializado.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información de Contacto y Ubicación -->
            <div class="row g-5 mt-5">
                <div class="col-lg-6">
                    <h3 class="h4 mb-4">Información de Contacto</h3>
                    <div class="contact-info">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>
                            <div>
                                <strong>Dirección:</strong><br>
                                Av. Junin 123
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone-fill text-primary me-3 fs-5"></i>
                            <div>
                                <strong>Teléfono:</strong><br>
                                +54 9 11 12345678
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill text-primary me-3 fs-5"></i>
                            <div>
                                <strong>Email:</strong><br>
                                contacto@zhennova.com
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock-fill text-primary me-3 fs-5"></i>
                            <div>
                                <strong>Horarios:</strong><br>
                                Lun - Vie: 9:00 AM - 7:00 PM<br>
                                Sáb: 9:00 AM - 5:00 PM
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="h4 mb-4">Nuestra Ubicación</h3>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1488.4193762280488!2d-58.8477367103026!3d-27.466836402421507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456cb9c10ae3fb%3A0x2f0b4215eb922614!2sJunin%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1748783286398!5m2!1ses-419!2sar" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php echo $this->endSection(); ?>
