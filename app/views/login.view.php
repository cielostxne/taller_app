<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>




<section class="section">
    <div class="container container-registro">
        <h2 class="title">Login</h2>
        <form class="box" action="/app/controllers/LoginController.php" method="POST">
            <!-- Token CSRF para proteger contra ataques -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="field">
                <label class="label">Correo</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="e.g. alex@example.com" required />
                </div>
            </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="********" required />
                </div>
            </div>

            <button class="button is-primary">Ingresar</button>
        </form>
    </div>
</section>