<section class="seccion">
    <div class="contador">
        <div class="button">
            <p>Total de artículos: <span id="contadorPost">0</span></p>
        </div>
    </div>

    <h2 class="title">Negocios</h2>

    <div class="contenedor-articulos">
        <!-- Artículos estáticos originales -->
        <article class="is-one-third box">
            <h3 class="title is-4">Las PYMES pueden aprovechar oportunidades en Mercado Público con estos pasos</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Negocios</p>
            </button>

            <p>El portal Innova ofrece una guía para que las pequeñas y medianas empresas (PYMES) encuentren oportunidades
                de negocio en el Mercado Público. Este espacio es clave para acceder a licitaciones y contratos con el Estado.
                El proceso comienza con la inscripción en el sistema, la búsqueda de licitaciones relacionadas con el giro de
                la empresa y la preparación de las propuestas. Además, se destacan estrategias para aumentar las posibilidades
                de éxito, como el cumplimiento de los requisitos técnicos y administrativos y el fortalecimiento de la
                competitividad.</p>
        </article>

        <article class="is-one-third box">
            <h3 class="title is-4">Confianza de los consumidores chilenos cae debido a apagón, guerra comercial y mayores
                gastos</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Negocios</p>
            </button>
            <p>En marzo de 2025, la confianza de los consumidores en Chile sufrió una caída significativa, afectada por
                varios factores, como el reciente apagón que afectó al país, la creciente guerra comercial y el aumento de los
                gastos familiares. Estos elementos han generado incertidumbre económica y disminuido la percepción de los
                chilenos sobre la estabilidad del mercado. Las proyecciones indican que estos factores seguirán impactando
                negativamente la confianza de los consumidores en el corto plazo.</p>
        </article>

        <article class="is-one-third box">
            <h3 class="title is-4">Acciones de Nvidia y Tesla caen un 6% y pierden 250,000 millones de dólares</h3>
            <button class="button">
                <p><span class="subtitle">Categoría:</span> Negocios</p>
            </button>
            <p>Las acciones de Nvidia y Tesla experimentaron una caída significativa del 6% en marzo de 2025, lo que resultó
                en una pérdida combinada de 250,000 millones de dólares en su capitalización de mercado. Esta caída se produjo
                en medio de un clima de incertidumbre económica global, impulsada por las políticas comerciales del presidente
                Trump, que incluyeron nuevos aranceles a las importaciones y restricciones a empresas tecnológicas chinas. Los
                inversores temen que las tensiones comerciales afecten a la demanda de productos clave, como los chips de
                inteligencia artificial de Nvidia y los vehículos eléctricos de Tesla.</p>
        </article>
        <!-- Artículos dinámicos desde localStorage -->
        <div id="contenedorArticulosNegocios"></div>
    </div>


    <!-- VIDEO SECTION -->

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