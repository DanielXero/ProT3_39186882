</main>

<!-- Footer -->
<footer class="footer bg-dark text-white py-5">
  <div class="container">
    <div class="row g-4">
      <!-- Información de la empresa -->
      <div class="col-lg-4 col-md-6">
        <h5 class="mb-3 d-flex align-items-center">
          <i class="bi bi-motherboard-fill me-2 text-primary"></i>
          <span>ZhenNova</span>
        </h5>
        <p class="small">Tu tienda especializada en insumos de computadoras. Calidad, confianza y tecnología de vanguardia.</p>
        <div class="footer-social d-flex gap-2">
          <a href="https://www.facebook.com/Talentosdigitalescorrientes/" target="_blank" aria-label="Facebook" class="social-icon"><i class="bi bi-facebook fs-5"></i></a>
          <a href="https://x.com/talentosctes" target="_blank" aria-label="Twitter" class="social-icon"><i class="bi bi-twitter fs-5"></i></a>
          <a href="https://www.instagram.com/talentosdigitalescorrientes/" target="_blank" aria-label="Instagram" class="social-icon"><i class="bi bi-instagram fs-5"></i></a>
          <a href="https://www.linkedin.com/" target="_blank" aria-label="LinkedIn" class="social-icon"><i class="bi bi-linkedin fs-5"></i></a>
          <a href="https://www.youtube.com/@TalentosDigitales" aria-label="YouTube" class="social-icon"><i class="bi bi-youtube fs-5"></i></a>
        </div>
      </div>

      <!-- Navegación rápida -->
      <div class="col-lg-2 col-md-6">
        <h6 class="mb-3">Enlaces</h6>
        <ul class="list-unstyled small">
          <li><a href="<?= site_url('/') ?>" class="text-light text-decoration-none mb-2 d-block">Inicio</a></li>
          <li><a href="<?= site_url('/acerca-de') ?>" class="text-light text-decoration-none mb-2 d-block">Acerca de</a></li>
          <li><a href="<?= site_url('/quienes-somos') ?>" class="text-light text-decoration-none mb-2 d-block">Quienes Somos</a></li>
          <li><a href="<?= site_url('/terminos-y-condiciones') ?>" class="text-light text-decoration-none d-block">Terminos y Condiciones</a></li>
        </ul>
      </div>

      <!-- Productos -->
      <div class="col-lg-3 col-md-6">
        <h6 class="mb-3">Productos</h6>
        <ul class="list-unstyled small">
          <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Procesadores</a></li>
          <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Tarjetas Gráficas</a></li>
          <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Memorias RAM</a></li>
          <li><a href="#" class="text-light text-decoration-none d-block">Almacenamiento</a></li>
        </ul>
      </div>

      <!-- Contacto -->
      <div class="col-lg-3 col-md-6">
        <h6 class="mb-3">Contacto</h6>
        <ul class="list-unstyled small">
          <li class="d-flex align-items-center mb-2">
            <i class="bi bi-geo-alt me-2 text-primary"></i>
            <span>Av. Junin 123</span>
          </li>
          <li class="d-flex align-items-center mb-2">
            <i class="bi bi-telephone-plus-fill me-2 text-primary"></i>
            <span>+54 9 11 12345678</span>
          </li>
          <li class="d-flex align-items-center">
            <i class="bi bi-envelope-at-fill me-2 text-primary"></i>
            <span>info@zhennova.com</span>
          </li>
        </ul>
      </div>
    </div>

    <hr class="my-4 border-secondary">

    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0 small">&copy; 2025 ZhenNova. Todos los derechos reservados.</p>
      </div>
    </div>
  </div>
</footer>
<script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/main.js') ?>"></script>

</body>

</html>