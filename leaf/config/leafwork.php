<?php
/***********************************************************************
 * LeafWork 2.0
 * ---------------------------------------------------------------------
 * File: leafwork.php
 * Author: Moisés Lodeiro <moises.lodeiro@gmail.com>
 * Licence: GPLv3 - http://www.gnu.org/licenses/gpl.txt
 * ---------------------------------------------------------------------
 * El archivo leafwork.php ( configuración ) guarda la configuración
 * en formato de array de las funcionalidades básicas del framework.
 **********************************************************************/
 
   // Template y acceso URL
	$config['basic']['load_template'] = true; // Establecer a false si no se quiere usar un template
	$config['basic']['template'] = ''; // Archivo template. Si no se desea usar ninguno dejar en blanco
   $config['basic']['template_path'] = 'vdl-themes/Default/'; // Carpeta por defecto donde se guardarán los templates partiendo del raíz. ( debe terminar en / )
   $config['basic']['allocate_path'] = true; // Permite establecer automáticamente la ruta en caso de usar template dinámico
   $config['basic']['dynamic_template'] = true; // Establece si el template será dinámico intentando cargar templates mediante URL
	$config['basic']['page_extensions'] = 'htm , html , php'; // Extensiones posibles para páginas
	$config['basic']['url'] = 'http://127.0.0.1'; // URL completa donde se encuentra la web SIN barra al final
	$config['basic']['base_url'] = '/Vidali/'; // Carpeta donde se encuentra el root del framework.
   $config['basic']['adminpass'] = '123456';
   
   // Errores
	$config['basic']['display_error'] = true; // Se establece si aparecerán errores ó no durante la ejecución.
	$config['basic']['error_level'] = E_ALL; // Si display_error está activo es el nivel que toma por defecto

   // Preload	
	$config['basic']['preload'] = true; // Cargar el preload
	$config['basic']['preload_page'] = 'vdl-include/preload.php'; // Si se deja en blanco se ejecuta el preload por defecto, de lo contrario se 

   // Configuración de seguridad
   $config['basic']['admin_email'] = 'bline.hodd@gmail.com'; // Correo del administrador
   $config['basic']['remove_globals'] = true; // Una vez tengas las variables $_POST, $_GET etc.. filtradas se borra el contenido de las globales.

?>
