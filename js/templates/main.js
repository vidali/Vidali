var main = '<header class="navbar navbar-inverse navbar-fixed-top" role="navigation"> \
	<div style="float: left;"> \
		<img src="img/v-mini.png"> \
	</div> \
	<ul class="nav nav-pills"> \
		<li id="m-update"> \
			<a rel="tooltip" data-placement="bottom" title="Update Status" class="updater"> \
				<span class="glyphicon glyphicon-edit"></span> \
			</a> \
		</li> \
		<li id="m-msg"> \
			<a rel="tooltip" data-placement="bottom" title="Messages" class="contentLink" data-toggle="modal" data-target="#myModal"> \
				<span class="glyphicon glyphicon-envelope"></span> \
			</a> \
		</li> \
		<li id="m-set" class="dropdown pull-right"> \
			<a id="drop" href="#" rel="tooltip" data-toggle="dropdown" data-placement="bottom" title="Settings" class="contentLink"> \
				<span class="glyphicon glyphicon-plus"></span> \
				<b class="caret"></b> \
			</a> \
			<ul id="menu" class="dropdown-menu" role="menu" aria-labelledby="drop"> \
				<li> \
					<a href="#" onclick="link(\'l\');" rel="tooltip" data-placement="bottom" title="Mode"> \
						<span class="glyphicon glyphicon-th"></span> \
						Clasic Mode \
					</a> \
				</li> \
				<li> \
					<a href="#" onclick="link(\'sec\');" rel="tooltip" data-placement="bottom" title="Secure Mode"> \
						<span class="glyphicon glyphicon-eye-close"></span> \
						Invisible Mode \
					</a> \
				</li> \
				<li id="m-set"> \
					<a href="#" onclick="link(\'s\');" rel="tooltip" data-placement="bottom" title="Settings" class="contentLink"> \
						<span class="glyphicon glyphicon-wrench"></span> \
						Settings \
					</a> \
				</li> \
				<li> \
					<a href="#" class="logout" rel="tooltip" data-placement="bottom" title="Logout"> \
						<span class="glyphicon glyphicon-off"></span> \
						Logout \
					</a> \
				</li> \
			</ul> \
		</li> \
	</ul> \
</header> \
<ul id="submenu" class="navbar-inner2"></ul> \
<div id="position"><span class="glyphicon glyphicon-map-marker"></span></div> \
<div id="map"></div> \
<div id="container2"></div> \
<nav id="apps" class="navbar navbar-inverse navbar-default navbar-fixed-bottom" role="navigation"> \
	<ul class="nav nav-pills"> \
		<li id="m-home"> \
			<a class="m-home" data-toggle="tooltip" data-placement="top" title="Home Page"> \
				<span class="glyphicon glyphicon-home"></span> \
			</a> \
		</li> \
		<li id="m-group"> \
			<a class="m-group" data-toggle="tooltip" data-placement="top" title="Groups"> \
				<span class="glyphicon glyphicon-globe"></span> \
			</a> \
		</li> \
		<li id="m-routes"> \
			<a class="m-routes" data-toggle="tooltip" data-placement="top" title="Routes"> \
				<span class="glyphicon glyphicon-road"></span> \
			</a> \
		</li> \
		<li id="m-files"> \
			<a class="m-files" data-toggle="tooltip" data-placement="top" title="Files"> \
				<span class="glyphicon glyphicon-folder-close"></span> \
			</a> \
		</li> \
	</ul> \
</nav> \
<footer class="footer"> \
	<p class="pull-right"><img src="img/html5.png"><img src="img/agpl.png"></p> \
	<p class="pull-left">Powered by Vidali.</p> \
</footer>\
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> \
  <div class="modal-dialog"> \
    <div class="modal-content"> \
      <div class="modal-header"> \
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> \
        <h4 class="modal-title" id="myModalLabel">Messages</h4> \
      </div> \
      <div class="modal-body"> \
        <div class="row"> \
        	<div class="col-xs-4 col-md-4"> \
				<div class="col-xs-12 col-md-12 well"><a href="#">Haridian Rodriguez</a></div> \
				<div class="col-xs-12 col-md-12 well"><a href="#">Iradiel García Pérez</a></div> \
				<div class="col-xs-12 col-md-12 well"><a href="#">Jose Hernandez</a></div> \
        	</div> \
        	<div class="col-xs-8 col-md-8 well"> CHAT DIALOG<br><br><br><br><br><br><br><br><br></div> \
        </div>\
      </div> \
      <div class="modal-footer"> \
        <div class="row"> \
        	<div class="col-xs-4 col-md-4"> \
				<div class="col-xs-12 col-md-12 ">Attach files | Send file</div> \
        	</div> \
        	<div class="col-xs-8 col-md-8"> \
        		<div class="row"> \
		        	<div class="col-xs-9 col-md-9"> \
						<input type="text" class="form-control" placeholder="Type your message..."> \
					</div> \
		        	<div class="col-xs-3 col-md-3"> \
						<button type="button" class="btn btn-default btn-block">Send</button> \
					</div> \
				</div> \
        	</div> \
        </div>\
      </div> \
    </div><!-- /.modal-content --> \
  </div><!-- /.modal-dialog --> \
</div><!-- /.modal --> \
<form id="updater" class="form-inline" onSubmit="update_status(); return false;" method="post" style="display: none;"> \
    <textarea id="update_box" name="update" class="form-control" rows="3" placeholder="Actualiza tu estado"></textarea> \
    <button class="btn btn-default"><span class="glyphicon glyphicon-star"></span></button> \
    <button class="btn btn-default"><span class="glyphicon glyphicon-upload"></span></button> \
    <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-ok"></span></button> \
</form>';