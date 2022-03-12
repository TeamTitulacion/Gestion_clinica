<!-- glovales -->

<script src="<?php echo SERVERURL ?>/vista/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo SERVERURL ?>/vista/js/jquery.pogo-slider.min.js"></script>
<script src="<?php echo SERVERURL ?>/vista/js/slider-index.js"></script>
<script> const base_url ='<?php echo  SERVERURL; ?>'</script>


<!-- index -->
<?php
if ($vistas == "index" || $vistas == "") { ?>
  <script src="<?php echo SERVERURL ?>/vista/js/main.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/TweenMax.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/owl.carousel.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/form-validator.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/contact-form-script.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/isotope.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/images-loded.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/custom.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/popper.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/material.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/maps.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYXTGgrbnMaIo8ywuHhRXzE_BTjvXjvE0&callback=initMap&libraries=&v=weekly&channel=2" async></script>
<?php } else { ?>

  <script src="<?php echo SERVERURL ?>/vista/js/metisMenu.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/startmin.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/tables.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/add.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/app.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/main.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/flot/excanvas.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/flot/jquery.flot.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/flot/jquery.flot.pie.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/flot/jquery.flot.time.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/flot/jquery.flot.tooltip.min.js"></script>
  <!--<script src="<?php echo SERVERURL ?>/vista/js/flot-data.js"></script> -->
  <script src="<?php echo SERVERURL ?>/vista/js/dataTables/jquery.dataTables.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/dataTables/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo SERVERURL ?>/vista/js/perfil.js"></script>

 

<?php }; ?>
