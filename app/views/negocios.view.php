<?php if (!empty($articulos)): ?>
<section class="seccion">
    <div class="contador">
        <div class="button">
            <p>Total de artículos: <span id="contadorPost"><?= count($articulos) ?></span></p>
        </div>
    </div>
    <h2 class="title">Negocios</h2>
    <div class="contenedor-articulos">
        <?php foreach ($articulos as $articulo): ?>
            <article class="is-one-third box">
                <h3 class="title is-4"><?= htmlspecialchars($articulo['titulo']) ?></h3>
                <button class="button">
                    <p><span class="subtitle">Categoría:</span> Negocios</p>
                </button>
                <p><?= nl2br(htmlspecialchars($articulo['contenido'])) ?></p>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- VIDEO -->
    <h2 class="title">¿Por qué caen los mercados?</h2>
    <div class="media-container">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/KB_1erbx6vs" frameborder="0"
            allowfullscreen></iframe>
    </div>

    <h3 class="subtitle">Jensen Huang (CEO Nvidia): "No aprendas a programar"</h3>
    <div class="media-container-audio">
        <audio controls>
            <source src="<?= URL_PATH ?>/assets/audio/audioNegocios.mp3" type="audio/mpeg">
            Tu navegador no soporta el elemento de audio.
        </audio>
    </div>

    <a href="<?= URL_PATH ?>" class="button">Volver al Menú</a>
</section>
<?php else: ?>
    <p>No hay artículos disponibles.</p>
<?php endif; ?>