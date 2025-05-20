<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Faro</title>
    <link rel="stylesheet" href="<?= URL_PATH ?>/assets/css/style.css">
    <link rel="icon" href="<?= URL_PATH ?>/assets/imagenes/favicon.ico" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"> 
</head>

<body>
    <?php require_once __DIR__ . '/../partials/navbar.php'?>
    <?php echo $content ?>
    <?php require_once __DIR__ . '/../partials/footer.php'; ?>

    


</body>
<script src="<?= URL_PATH ?>/assets/js/main.js"></script>
</html>