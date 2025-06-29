
<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>

<!--  Quienes Somos -->
<section class="section-team">
  <div class="container">
    <div class="section-title fade-in text-center">
      <h2 class="display-3 fw-bold">Quiénes Somos</h2>

    </div>

    <div class="row mb-5 fade-in">
      <div class="col-lg-8 mx-auto text-center">

        <p class="lead"> ZhenNova nació de la pasión por la tecnología y el rendimiento
          extremo. Sabemos lo importante que es contar con componentes
          confiables y actualizados para construir o mejorar tu PC. Por eso,
          seleccionamos cuidadosamente cada producto que ofrecemos, desde
          memorias RAM de alta velocidad hasta tarjetas gráficas de última
          generación. ¡Aquí encontrarás todo lo necesario para llevar tu
          equipo al siguiente nivel!</p>
        <p>Nuestro nombre combina "Zhen" (auténtico en mandarín) y "Nova" (nueva estrella en latín), reflejando nuestro compromiso con la autenticidad y la innovación constante.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4 fade-in">
        <div class="card team-card">
          <div class="card-body text-center">
            <img src="<?php echo base_url('public/assets/img/quienes-1.png') ?>" class="img-fluid shadow-sm rounded" alt="CEO">
            <h4 class="card-title">Carlos Rodriguez</h4>
            <p class="text-muted">CEO & Fundador</p>
            <p class="card-text">Ingeniero en Sistemas con 15 años de experiencia en el sector tecnológico. Visionario y líder del proyecto ZhenNova.</p>
            <div class="mt-3">
              <span class="badge bg-primary me-1">Liderazgo</span>
              <span class="badge bg-secondary me-1">Estrategia</span>
              <span class="badge bg-success">Innovación</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4 fade-in">
        <div class="card team-card">
          <div class="card-body text-center">
            <img src="<?php echo base_url('public/assets/img/quienes-2.png') ?>" class="img-fluid shadow-sm rounded" alt="CTO">
            <h4 class="card-title">Ana Martinez</h4>
            <p class="text-muted">CTO & Co-fundadora</p>
            <p class="card-text">Especialista en hardware y arquitectura de computadoras. Responsable de la selección y evaluación técnica de productos.</p>
            <div class="mt-3">
              <span class="badge bg-primary me-1">Hardware</span>
              <span class="badge bg-secondary me-1">Calidad</span>
              <span class="badge bg-success">Tecnología</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4 fade-in">
        <div class="card team-card">
          <div class="card-body text-center">
            <img src="<?php echo base_url('public/assets/img/quienes-3.png') ?>" class="img-fluid shadow-sm rounded" alt="Director de Ventas">
            <h4 class="card-title">Miguel Gonzalez</h4>
            <p class="text-muted">Director de Ventas</p>
            <p class="card-text">Experto en atención al cliente y ventas consultivas. Garantiza la mejor experiencia de compra para nuestros clientes.</p>
            <div class="mt-3">
              <span class="badge bg-primary me-1">Ventas</span>
              <span class="badge bg-secondary me-1">Servicio</span>
              <span class="badge bg-success">Comunicación</span>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>


<!-- Fin del contenido original -->
<?php echo $this->endSection(); ?>


