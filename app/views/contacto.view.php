

<section class="section">
    <div class="container container-registro">
        <h2 class="title">Formulario de Contacto</h2>
        <form class="box" action="/app/controllers/ContactoController.php" method="POST">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                <input class="input" type="email" name="nombre" placeholder="e.g. alex@example.com" required />
                </div>
            </div>
            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                <input class="input" type="text" name="email" placeholder="e.g. alex@example.com" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Mensaje</label>
                <div class="control">
                    <textarea class="textarea" id="mensaje" name="mensaje" rows="5" required></textarea>
                </div>
            </div>

            <button class="button is-primary">Enviar</button>
        </form>

    </div>
</section>