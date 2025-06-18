  <!DOCTYPE html>
  <html lang="es-AR">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title> <?= esc($title) ?> | ZhenNova</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link
      href="<?php echo base_url('public/assets/css/bootstrap.min.css') ?>"
      rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- CSS principal -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css') ?>">
  </head>

  <body>
    <!--  -->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="<?= site_url('/') ?>">
            <img src="<?= base_url('public/assets/img/logo.png') ?>" class="img-fluid shadow-sm rounded" loading="lazy" alt="ZhenNova Logo" style="max-height: 60px" />
          </a>

          <!-- Botón de hamburguesa -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Contenido del nav -->
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- Grupo izquierdo -->
            <ul class="navbar-nav mb-3 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/') ?>">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/acerca-de') ?>">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/quienes-somos') ?>">Quiénes Somos</a>
              </li>
            </ul>

            <!-- Formulario de búsqueda -->
            <form class="search-form w-50 my-2 my-lg-0 position-relative mx-auto" role="search">
              <label for="searchInput" class="visually-hidden">Buscar componentes</label>
              <div class="input-group">
                <span class="input-group-text bg-white text-primary border-0 rounded-start-pill">
                  <i class="bi bi-search"></i>
                </span>
                <input class="form-control ps-2 py-2 rounded-end-pill shadow-none" type="search"
                  placeholder="Buscar componentes..." id="searchInput" aria-label="Buscar" autocomplete="off" />
              </div>
              <div class="autocomplete-results position-absolute w-100 mt-1 bg-white border shadow-sm rounded-1 d-none"
                id="autocompleteResults">
                <!-- Resultados dinámicos aquí -->
              </div>
            </form>

            <!-- Grupo derecho -->
            <ul class="navbar-nav ms-auto mt-4 mt-lg-0">
              <li class="nav-item me-3">

                <a class="btn btn-outline-light" href="<?= site_url('/login') ?>"> <i class="bi bi-person"></i> Ingresar</a>
              </li>
              <li class="nav-item ">

                <a class="btn btn-outline-light" href="<?= site_url('/registro') ?>"> <i class="bi bi-person"></i> Registrarse</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>


    <main class="main-gradient">