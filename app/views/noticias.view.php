<?php if (!empty($articulos)): ?>
<section class="seccion">
    <div class="contador">
        <div class="button">
            <p>Total de artículos: <span id="contadorPost"><?= count($articulos) ?></span></p>
        </div>
    </div>
    <h2 class="title">Noticias</h2>
    <div class="contenedor-articulos">

        <?php foreach ($articulos as $articulo): ?>
            <article class="is-one-third box">
                <h3 class="title is-4"><?= htmlspecialchars($articulo['titulo']) ?></h3>
                <button class="button">
                    <p><span class="subtitle">Categoría:</span> Noticias</p>
                </button>
                <p><?= nl2br(htmlspecialchars($articulo['contenido'])) ?></p>
            </article>
        <?php endforeach; ?>

    </div>
    <a href="<?= URL_PATH ?>" class="button">Volver al Menú</a>
</section>
<?php else: ?>
    <p>No hay artículos disponibles.</p>
<?php endif; ?>