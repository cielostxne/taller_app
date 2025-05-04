<section class="seccion">
    <div class="contador">
        <div class="button">
            <p>Total de artículos: <span id="contadorPost">0</span></p>
        </div>
    </div>
    <h2 class="title">Noticias</h2>
    <div class="contenedor-articulos">



        <!-- Artículos estáticos originales -->
        <article class="is-one-third box">
            <h3 class="title is-4">Elon Musk proyecta un futuro dominado por robots.</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Noticias</p>
            </button>
            <p>Elon Musk asegura que los robots humanoides podrían revolucionar la economía, convirtiéndose en un mercado
                valuado en 10 billones de dólares. Las empresas tecnológicas ya están apostando fuerte por esta tendencia.</p>
        </article>

        <article class="is-one-third box">
            <h3 class="title is-4">Discos duros NVMe mecánicos por Seagate.</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Noticias</p>
            </button>
            <p>Seagate sorprende al mundo con discos duros que combinan almacenamiento mecánico y la velocidad de NVMe,
                marcando un nuevo hito en el desarrollo de hardware.</p>
        </article>

        <article class="is-one-third box">
            <h3 class="title is-4">Google lanza su chip cuántico Willow.</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Noticias</p>
            </button>
            <p>El nuevo chip cuántico de Google promete resolver problemas complejos en minutos, revolucionando la
                computación avanzada y dejando atrás las capacidades de los superordenadores actuales.</p>
        </article>

        <article class="is-one-third box">
            <h3 class="title is-4">Robots humanoides comienzan a llegar a los hogares.</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Noticias</p>
            </button>
            <p>La robótica doméstica da un salto con la llegada de robots humanoides accesibles al público, facilitando
                tareas del hogar y ofreciendo soluciones inteligentes.</p>
        </article>
        <!-- Artículos dinámicos desde localStorage -->
        <div id="contenedorArticulosNoticias"></div>
    </div>

    <a href="<?= URL_PATH ?>" class="button">Volver al Menú</a>
</section>