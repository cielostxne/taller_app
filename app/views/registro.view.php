<section class="section">
    <div class="container container-registro">
        <h2 class="title">Registro</h2>
        <form class="box" action="/app/controllers/RegistroController.php" method="POST">
            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                <input class="input" type="email" name="email" placeholder="e.g. alex@example.com" required />
                </div>
            </div>
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                <input class="input" type="text" name="nombre" placeholder="e.g. alex@example.com" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                <input class="input" type="password" name="password" placeholder="********" required />
                </div>
            </div>

            <button class="button is-primary">Enviar</button>
        </form>

    </div>
</section>