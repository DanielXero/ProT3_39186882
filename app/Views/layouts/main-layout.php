<!DOCTYPE html>
<html lang="es-AR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= esc($title ?? 'ZhenNova') ?> | ZhenNova</title> <!-- Asegura un título por defecto -->

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/styles.css') ?>">

    <?= $this->renderSection('page_css') ?> <!-- Para CSS específico de página si es necesario -->
</head>

<body>

    <!-- Header -->
    <?= $this->include('templates/header') ?>

    <!-- Contenido Principal -->
    <main class="main-gradient">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?= $this->include('templates/footer') ?>

    <!-- Bootstrap Bundle JS (incluye Popper.js) -->
    <script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Custom JS -->
    <script src="<?php echo base_url('public/assets/js/main.js') ?>"></script>

    <?= $this->renderSection('page_js') ?> <!-- Para JS específico de página si es necesario -->
</body>

</html>