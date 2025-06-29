<?php echo $this->extend('layouts/main-layout'); ?>

<?php echo $this->section('content'); ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center text-white">Gestión de Usuarios</h1>
        <!-- Botón para Crear Nuevo Usuario -->
        <a href="<?= site_url('/registro') ?>" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-circle"></i> Nuevo Usuario
        </a>
    </div>

    <div class="container py-5">

        <!-- Mensajes Flash -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($usuarios)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">No hay usuarios registrados aún.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($usuarios as $usuario): ?>
                                    <tr>
                                        <th scope="row"><?= esc($usuario->id_usuario) ?></th>
                                        <td><?= esc($usuario->getFullName()) ?></td> <!-- Usando la Entity -->
                                        <td><?= esc($usuario->email) ?></td>
                                        <td><?= esc($usuario->getRoleDescription()) ?></td> <!-- Usando la Entity -->
                                        <!-- Mostrar estado y botón de acción según el estado -->
                                        <?php if ($usuario->isActive()): // isActive() verifica si baja == 0 
                                        ?>
                                            <td><span class="badge bg-success">Activo</span></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="<?= site_url('/usuarios/editar/' . $usuario->id_usuario) ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil-square"></i> Editar
                                                    </a>
                                                    <!-- Botón Eliminar (para usuarios activos) -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?= $usuario->id_usuario ?>" data-name="<?= esc($usuario->getFullName()) ?>" data-action="eliminar">
                                                        <i class="bi bi-trash"></i> Eliminar
                                                    </button>
                                                </div>
                                            </td>
                                        <?php else: // Usuario está inactivo (baja == 1) 
                                        ?>
                                            <td><span class="badge bg-warning text-dark">Inactivo</span></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <!-- Botón Restaurar (para usuarios inactivos) -->
                                                    <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmRestoreModal" data-id="<?= $usuario->id_usuario ?>" data-name="<?= esc($usuario->getFullName()) ?>" data-action="restaurar">
                                                        <i class="bi bi-arrow-clockwise"></i> Restaurar
                                                    </button>
                                                    <!-- Opcional: Botón para Borrado Físico (usar con precaución) -->
                                                    <!-- <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmPermanentDeleteModal" data-id="<?= $usuario->id_usuario ?>" data-name="<?= esc($usuario->getFullName()) ?>" data-action="permanent-delete">
                                                    <i class="bi bi-x-octagon"></i> Borrar
                                                </button> -->
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Borrado -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar al usuario "<strong id="modalUserName"></strong>"? Esta acción no se puede deshacer.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="POST" action="">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Confirmación de Restauración -->
    <div class="modal fade" id="confirmRestoreModal" tabindex="-1" aria-labelledby="confirmRestoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmRestoreModalLabel">Confirmar Restauración</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas restaurar al usuario "<strong id="modalRestoreUserName"></strong>"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="restoreForm" method="POST" action="">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-success">Restaurar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->endSection(); ?>

    <?php echo $this->section('page_js'); ?>
    <script>
        function autoCloseAlerts(selector = '.alert-dismissible', delay = 5000) {
            const alerts = document.querySelectorAll(selector);
            alerts.forEach(alert => {
                // Buscamos el botón de cierre dentro de la alerta
                const dismissButton = alert.querySelector('[data-bs-dismiss="alert"]');
                if (dismissButton) {
                    // Usamos setTimeout para cerrar la alerta después del delay especificado
                    setTimeout(() => {
                        // Creamos un evento de clic en el botón de cierre para que se active el comportamiento de Bootstrap
                        dismissButton.click();
                    }, delay);
                }
            });
        }
        // Script para pasar datos al modal de confirmación
        document.addEventListener('DOMContentLoaded', function() {
            const confirmDeleteModal = document.getElementById('confirmDeleteModal');
            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                // Botón que activó el modal
                const button = event.relatedTarget;
                // Extraer información de los atributos data-*
                const userId = button.getAttribute('data-id');
                const userName = button.getAttribute('data-name');

                // Actualizar el contenido del modal
                const modalUserName = confirmDeleteModal.querySelector('#modalUserName');
                const deleteForm = confirmDeleteModal.querySelector('#deleteForm');

                modalUserName.textContent = userName;
                // Configurar el action del formulario de borrado
                deleteForm.action = `<?= site_url('/usuarios/eliminar/') ?>${userId}`;
            });

            // Script para el modal de Restauración
            const confirmRestoreModal = document.getElementById('confirmRestoreModal');
            if (confirmRestoreModal) {
                confirmRestoreModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; // Botón que activó el modal
                    const userId = button.getAttribute('data-id');
                    const userName = button.getAttribute('data-name');
                    const modalRestoreUserName = confirmRestoreModal.querySelector('#modalRestoreUserName');
                    const restoreForm = confirmRestoreModal.querySelector('#restoreForm');

                    modalRestoreUserName.textContent = userName;
                    restoreForm.action = `<?= site_url('/usuarios/restaurar/') ?>${userId}`; // Action para restaurar
                });
            }

            // Llamar a la función para que las alertas se cierren automáticamente
            autoCloseAlerts('.alert-dismissible', 5000); // 5000 milisegundos = 5 segundos
        });
    </script>
    <?php echo $this->endSection(); ?>