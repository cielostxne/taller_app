<?php
$regionId = $_GET['id_reg'] ?? null;

require_once __DIR__ . '/../config/Database.php';
$db = Database::getInstance()->getConnection();
?>

<h1 class="title">Mapa de Regiones</h1>

<div class="mapa-noticias-container">
  <div class="mapa-fijo">
    <div id="svgMapaContainer"></div>
  </div>

  <div class="noticias-contenedor">
    <?php if ($regionId): ?>
      <?php
      // Obtener el nombre de la región para mostrarlo
      $stmt = $db->prepare("SELECT nombreRegion FROM regiones WHERE id_region = :regionId");
      $stmt->bindParam(':regionId', $regionId, PDO::PARAM_INT);
      $stmt->execute();
      $region = $stmt->fetchColumn();
      ?>

      <h2 class="subtitle">Región: <?= htmlspecialchars($region) ?></h2>

      <?php
      $stmt = $db->prepare("
        SELECT n.titulo, n.noticia, n.fecha_publi
        FROM noticiasReg n
        WHERE n.id_reg = :regionId
        ORDER BY n.fecha_publi DESC
      ");
      $stmt->bindParam(':regionId', $regionId, PDO::PARAM_INT);
      $stmt->execute();
      $noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <?php if ($noticias): ?>
        <?php foreach ($noticias as $noticia): ?>
          <div class="box">
            <h3 class="title is-5"><?= htmlspecialchars($noticia['titulo']) ?></h3>
            <p class="is-size-7 has-text-grey">Publicado: <?= $noticia['fecha_publi'] ?></p>
            <p><?= nl2br(htmlspecialchars($noticia['noticia'])) ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No hay noticias disponibles para esta región.</p>
      <?php endif; ?>
    <?php else: ?>
      <p class="has-text-grey">Haz clic en una región del mapa para ver las noticias correspondientes.</p>
    <?php endif; ?>
  </div>
</div>

<!-- ☁ Tooltip flotante -->
<div id="tooltip-regiones" class="tooltip-mapa"></div>

<script>
const tooltip = document.getElementById('tooltip-regiones');
const mapaContainer = document.getElementById('svgMapaContainer');

fetch('/public/assets/mapas/regiones.svg')
  .then(res => res.text())
  .then(svgText => {
    mapaContainer.innerHTML = svgText;

    const paths = mapaContainer.querySelectorAll('path[data-region-id]');
    paths.forEach(path => {
      path.style.cursor = 'pointer';

      path.addEventListener('mouseenter', () => {
        tooltip.style.display = 'block';
        tooltip.textContent = path.getAttribute('data-region-nombre');
      });

      path.addEventListener('mousemove', (e) => {
        tooltip.style.left = e.clientX + 15 + 'px';
        tooltip.style.top = e.clientY + 15 + 'px';
      });

      path.addEventListener('mouseleave', () => {
        tooltip.style.display = 'none';
      });

      // Redirección al hacer click
      path.addEventListener('click', () => {
        const regionId = path.getAttribute('data-region-id');
        window.location.href = `?id_reg=${regionId}`;
      });
    });
  });
</script>

<style>
.mapa-noticias-container {
  display: flex;
  gap: 2rem;
  padding: 2rem;
  flex-wrap: wrap;
}
.mapa-fijo {
  flex: 1 1 300px;
  max-width: 600px;
}
.noticias-contenedor {
  flex: 2 1 400px;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}
.tooltip-mapa {
  position: fixed;
  background: #333;
  color: #fff;
  padding: 6px 10px;
  font-size: 0.85rem;
  border-radius: 5px;
  pointer-events: none;
  display: none;
  z-index: 9999;
  white-space: nowrap;
  box-shadow: 0 0 8px rgba(0,0,0,0.4);
}
.box {
  border: 1px solid #ccc;
  padding: 1rem;
  border-radius: 8px;
  background-color: #111;
}
h1.title {
  margin-left: 8rem;
}
.mapa-fijo {
  margin-left: 8rem;
}
</style>
