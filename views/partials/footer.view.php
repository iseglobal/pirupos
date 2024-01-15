<div id="loading-element" class="position-fixed bottom-0 end-0 m-3 d-none">
  <div class="d-flex align-items-center">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <div class="ms-2">Cargando...</div>
  </div>
</div>

<!-- Js Bootstrap-->
<script src="<?= APP_URL ?>/assets/js/app.js"></script>
<!-- <script src="<?= APP_URL ?>/assets/js/feathericons.js"></script> -->
<!-- <script src="<?= APP_URL ?>/assets/js/chartjs.js"></script> -->
<script>
  const baseURL = "<?= APP_URL ?>";
</script>

<?php
if (isset($theme_scripts)) {
  foreach ($theme_scripts as $script) {
    echo "<script src=\"" . APP_URL . "/" . $script . "\"></script>";
  }
}
?>
</body>

</html>