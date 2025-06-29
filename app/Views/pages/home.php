<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>
  <!-- Inicio -->
  <h1 class="hero-title">Bienvenido a ZhenNova</h1>

    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="hero-slide d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%)">
            <div class="container py-5">
              <div class="row align-items-center min-vh-50">
                <div class="col-lg-6 text-white">
                  <div class="hero-content px-md-4">
                    <h1 class="display-4 fw-bold mb-4">Nuevas RTX 4090</h1>
                    <p class="lead mb-4">Experimenta el máximo rendimiento en gaming y creación de contenido.</p>
                    <a href="<?= site_url('producto') ?>" class="btn btn-light btn-lg rounded-pill px-4">Ver Productos</a>
                  </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                  <img src="<?php echo base_url('public/assets/img/RTX-4090.jpg') ?>" alt="Tarjeta Gráfica NVIDIA RTX 4090" class="img-fluid shadow-sm rounded" loading="lazy" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="hero-slide d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%)">
            <div class="container py-5">
              <div class="row align-items-center min-vh-50">
                <div class="col-lg-6 text-white">
                  <div class="hero-content px-md-4">
                    <h1 class="display-4 fw-bold mb-4">Procesadores AMD Ryzen</h1>
                    <p class="lead mb-4">Potencia y eficiencia para tu próxima build.</p>
                    <a href="#" class="btn btn-light btn-lg rounded-pill px-4">Explorar</a>
                  </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                  <img src="<?php echo base_url('public/assets/img/ryzen.jpg') ?>" alt="Procesador AMD Ryzen 9" class="img-fluid shadow-sm rounded" oading="lazy" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="hero-slide d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)">
            <div class="container py-5">
              <div class="row align-items-center min-vh-50">
                <div class="col-lg-6 text-white">
                  <div class="hero-content px-md-4">
                    <h1 class="display-4 fw-bold mb-4">SSD NVMe Ultra Rápidos</h1>
                    <p class="lead mb-4">Velocidades de hasta 7,000 MB/s para tu sistema.</p>
                    <a href="#" class="btn btn-light btn-lg rounded-pill px-4">Comprar Ahora</a>
                  </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                  <img src="<?php echo base_url('public/assets/img/memoria.jpg') ?>" alt="Unidad SSD NVMe de alta velocidad" class="img-fluid shadow-sm rounded" oading="lazy" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Anterior">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Siguiente">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>

<!-- Fin del contenido original -->
<?php echo $this->endSection(); ?>