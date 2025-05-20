<?php if (!empty($articulos)): ?>

<main class="">
    <div class="main_div_contener_home ">
        <section class="seccion hero hero-gradient">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent">
                            <article class="tile is-child is-info">
                                <div class="contador">
                                    <div class="button">
                                        <p>Total de artículos: <span id="contadorPost"><?= count($articulos) ?></span></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child is-primary">
                                <h2 class="title titulo-seccion"><span>Deportes</span></h2>
                            </article>
                        </div>
                    </div>
            


                                    
                    

                    <div class="tile is-parent">
                        <article class="tile is-child">
                            <div class="content">
                                <div class="contenedor-articulos">
                                    <?php foreach ($articulos as $articulo): ?>
                                        <article class="is-one-third box">
                                            <h3 class="title is-4"><?= htmlspecialchars($articulo['titulo']) ?></h3>
                                            <button class="button">
                                                <p><span class="subtitle">Categoría:</span> Deportes</p>
                                            </button>
                                            <p><?= nl2br(htmlspecialchars($articulo['contenido'])) ?></p>
                                        </article>
                                    <?php endforeach; ?>
                                </div>




                                <!-- VIDEO -->
                                <h2 class="title">Chile y las complicaciones con el mundial</h2>
                                <div class="media-container">
                                    <iframe src="https://www.youtube.com/embed/zjTimlLVBLE" frameborder="0"
                                        allowfullscreen></iframe>
                                </div>

                                <h3 class="subtitle">Entrevista Arturo Vidal</h3>
                                <div class="media-container-audio">
                                    <audio controls>
                                        <source src="<?= URL_PATH ?>/assets/audio/audioDeportes.mp3" type="audio/mpeg">
                                        Tu navegador no soporta el elemento de audio.
                                    </audio>
                                </div>
                                <a href="<?= URL_PATH ?>" class="button">Volver al Menú</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php else: ?>
    <p>No hay artículos disponibles.</p>
<?php endif; ?>