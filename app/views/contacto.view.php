<section class="seccion hero hero-gradient">
    <!-- FORMULARIO DE CONTACTO -->
    <section class="section">
        <div class="container container-contacto">
            <h2 class="title">Formulario de Contacto</h2>
            <form action="/app/controllers/ContactoController.php" method="POST">

                <div class="field">
                    <label class="label" for="nombre">Nombre</label>
                    <div class="control">
                        <input class="input" type="text" id="nombre" name="nombre" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="email">Correo</label>
                    <div class="control">
                        <input class="input" type="email" id="email" name="email" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="mensaje">Mensaje</label>
                    <div class="control">
                        <textarea class="textarea" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                </div>

                <div class="control mt-4 control-btn">
                    <button type="submit" class="button is-link is-fullwidth">Enviar</button>
                </div>

            </form>
        </div>
    </section>


</section>