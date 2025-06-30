<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>

<div class="container py-5">
    <h1 class="display-4 text-center mb-4 text-white"><?= esc($title) ?></h1>
    <p class="lead text-center  text-white"><?= esc($adminMessage) ?></p>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-people-fill text-primary fs-1 mb-3"></i>
                    <h5 class="card-title">Gestión de Usuarios</h5>
                    <p class="card-text">Administra usuarios, roles y permisos.</p>
                    <a href="<?= site_url('/usuarios') ?>" class="btn btn-outline-primary mt-3">Ir a Usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-box-fill text-secondary fs-1 mb-3"></i>
                    <h5 class="card-title">Gestión de Productos</h5>
                    <p class="card-text">Agrega, edita y elimina productos.</p>
                    <a href="#" class="btn btn-outline-secondary mt-3">Ir a Productos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-file-earmark-text-fill text-success fs-1 mb-3"></i>
                    <h5 class="card-title">Gestión de Pedidos</h5>
                    <p class="card-text">Revisa y procesa órdenes de compra.</p>
                    <a href="#" class="btn btn-outline-success mt-3">Ir a Pedidos</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>