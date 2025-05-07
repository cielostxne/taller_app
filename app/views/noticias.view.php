<?php
// Conexión directa a la base de datos
try {
    $conn = new PDO("mysql:host=sql301.infinityfree.com;dbname=if0_38896219_elfaro_db", "if0_38896219", "030525faro");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8mb4");


    // Consulta para artículos de la categoría Deportes (id_categoria = 1)
    $stmt = $conn->prepare("SELECT titulo, contenido FROM articulos WHERE id_categoria = 4 ORDER BY id_articulos DESC");
    $stmt->execute();
    $articulosDeportes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error de conexión o consulta: " . $e->getMessage());
}
?>

<section class="seccion">
    <div class="contador">
        <div class="button">
            <p>Total de artículos: <span id="contadorPost">0</span></p>
        </div>
    </div>
    <h2 class="title">Noticias</h2>
    <div class="contenedor-articulos">

                    <?php foreach ($articulosDeportes as $articulo): ?>
                        <article class="is-one-third box">
                            <h3 class="title is-4"><?= htmlspecialchars($articulo['titulo']) ?></h3>
                            <button class="button">
                                <p><span class="subtitle">Categoría:</span> Negocios</p>
                            </button>
                            <p><?= nl2br(htmlspecialchars($articulo['contenido'])) ?></p>
                        </article>
                    <?php endforeach; ?>


        <div id="contenedorArticulosNoticias"></div>
    </div>

    <a href="<?= URL_PATH ?>" class="button">Volver al Menú</a>
</section>