<?php $pg=""; if(isset($_GET['p1'])) $pg=$_GET['p1']; ?>
<ul class="nav row">
  <li class="<?php echo ($pg == '')? 'active ':'';?> span2 offset1"><a href="/Vidali"><i class="icon-home"></i> Home</a></li>
  <li class="<?php echo ($pg == 'm')? 'active ':'';?> span2"><a href="<?php echo BASEDIR; ?>/m/"><i class="icon-envelope"></i> Mensajes</a></li>
  <li class="<?php echo ($pg == 'g')? 'active ':'';?> span2"><a href="<?php echo BASEDIR; ?>/g/"><i class="icon-globe"></i> Grupos</a></li>
  <li class="<?php echo ($pg == 'f')? 'active ':'';?> span2"><a href="<?php echo BASEDIR; ?>/f/"><i class="icon-folder-open"></i> Archivos</a></li>
  <li class="<?php echo ($pg == 's')? 'active ':'';?> span2"><a href="<?php echo BASEDIR; ?>/s/"><i class="icon-wrench"></i> Ajustes</a></li>
</ul>
