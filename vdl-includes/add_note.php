<?php
/*	Vidali, Social Network Open Source.
This file is part of Vidali.

Vidali is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Vidali is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.*/

	include("../vdl-functions/notes.class.php");
	$note_class= new Notes();
	$message=htmlspecialchars($_POST['post']);
	date_default_timezone_set('Europe/London');
	$date = date("Y-m-d G:i:s");
	$notes = $note_class->set_note($_POST["title"],$_POST["resume"],$message,$_POST["user"],$date,$_POST["categs"],$_POST['add_cat'],$_POST["add_cat_ok"]);

?>
