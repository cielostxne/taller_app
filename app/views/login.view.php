<section class="section">
    <div class="container container-registro">
        <h2 class="title">Login</h2>
        <form action="/app/controllers/LoginController.php" method="POST">
            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                    <input class="input" type="email" name="email" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" type="password" name="password" required>
                </div>
            </div>
            <div class="control mt-4 control-btn">
                <button class="button is-link is-fullwidth">Login</button>
            </div>
        </form>
    </div>
</section>