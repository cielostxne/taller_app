<section class="section">
    <div class="container container-registro">
        <h2 class="title">Registro</h2>
        <form action="/app/controllers/RegistroController.php" method="POST">
            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                    <input class="input" type="email" name="email" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" name="nombre" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" type="password" name="password" required>
                </div>
            </div>
            <div class="control mt-4 control-btn">
                <button class="button is-link is-fullwidth">Enviar</button>
            </div>
        </form>
    </div>
</section>