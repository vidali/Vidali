<?php $pg=""; if(isset($_GET['p1'])) $pg=$_GET['p1']; ?>

<ul class="nav row main-menu">
  <li class="span2 offset1"><a class="pointer" onclick="link('h');"><i class="icon-home"></i> Home</a></li>
  <li class="span2"><a class="pointer" onclick="link('m');"><i class="icon-envelope"></i> Mensajes</a></li>
  <li class="span2"><a class="pointer" onclick="link('g');"><i class="icon-globe"></i> Grupos</a></li>
  <li class="span2"><a class="pointer" onclick="link('f');"><i class="icon-folder-open"></i> Archivos</a></li>
  <li class="span2"><a  class="pointer" onclick="link('s');"><i class="icon-wrench"></i> Ajustes</a></li>
</ul>
