<?php if (!empty($usuarios)): ?>
<section class="section">
    <div class="container">
        <h1 class="title">Usuarios Registrados</h1>

        <table class="table is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                        <td><?= htmlspecialchars($usuario['correo']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php else: ?>
    <p>No hay usuarios registrados.</p>
<?php endif; ?>