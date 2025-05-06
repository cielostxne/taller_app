<?php
// Conexión directa a la base de datos
try {
    $conn = new PDO("mysql:host=sql301.infinityfree.com;dbname=if0_38896219_elfaro_db", "if0_38896219", "030525faro");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8mb4");


    // Consulta a la base de datos
    $stmt = $conn->query("SELECT nombre, correo FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al conectar o consultar: " . $e->getMessage());
}
?>




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
