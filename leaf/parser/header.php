  <div id="tittle" class="span3 offset2">
        <a class="brand" href="<?php echo BASEDIR; ?>/"><img src="img/logo.png" border="0"></a>
    </div>
    <div id="menu" class="span3">
		<form class="form-search" action="<?php echo BASEDIR; ?>/vdl-search/index.php" method="post">
		  <div class="input-append">
			<input type="text" name="search" class="span2 search-query">
			<button type="submit" class="btn">buscar</button>
		  </div>
		</form>
	</div>
    <div id="menu" class="span2 offset2">
        <a href="<?php echo BASEDIR; ?>/?action=logout" title="logout"><img src="img/lock.png"></a>
    </div>
