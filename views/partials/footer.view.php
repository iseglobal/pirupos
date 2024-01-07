

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