<?php
    echo '<form id="form_login" method="post" name="vdl-login" onsubmit="doLogin(); return false;" autocomplete="on">';
    //echo '<form method="post" action="'.BASEDIR.'/vdl-include/session_start.php">';
?>
    <input id="user" name="user" class="input" type="text" placeholder="Email" autofocus="autofocus">
    <input id="password" name="password" class="input" type="password" placeholder="Contrase&ntilde;a">
    <label class="string optional" for="user_remember_me">
        <input type="checkbox" id="remember" name="remember" value="1"> Recordar mi sesión
    </label>
    <label class="string optional" for="forgotten_password">
        <a href="#"> He olvidado mi contraseña</a>
    </label>
    <button class="btn btn-large btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" value="ok" type="submit">Iniciar sesi&oacute;n</button>
</form>

