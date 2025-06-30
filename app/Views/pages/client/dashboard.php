<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>

<div class="container py-5">
    <h1 class="display-4 text-center mb-4 text-white"><?= esc($title) ?></h1>
    <p class="lead text-center text-white"><?= esc($clientMessage) ?></p>

    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-list-ul text-primary fs-1 mb-3"></i>
                    <h5 class="card-title">Mis Pedidos</h5>
                    <p class="card-text">Consulta el historial de tus compras.</p>
                    <a href="#" class="btn btn-outline-primary mt-3">Ver Pedidos</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-person-gear text-secondary fs-1 mb-3"></i>
                    <h5 class="card-title">Mi Cuenta</h5>
                    <p class="card-text">Actualiza tu información personal.</p>
                    <a href="#" class="btn btn-outline-secondary mt-3">Editar Cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>