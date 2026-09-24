import re
with open('vista/contenido/citas-view.php', 'r') as f:
    content = f.read()
old = '''<?php if ($_SESSION['rol']==1) { ?>
    <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/app.js"></script>
    <?php }
    else { ?>
    <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/appmed.js"></script>
    <?php  } ?>


<script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/main.min.js"></script>'''
new = '''<script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/main.min.js"></script>
<?php if ($_SESSION['rol']==1) { ?>
    <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/app.js"></script>
    <?php }
    else { ?>
    <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/appmed.js"></script>
    <?php  } ?>'''
content = content.replace(old, new)
with open('vista/contenido/citas-view.php', 'w') as f:
    f.write(content)
