<?php	
# Ejemplos de uso de mwApi.
  
// Primero se inicia la clase. Esta tiene cuatro parametros:
  // El usuario, la contraseña, la URL de la wiki y el 
  // UserAgent que se usara para realizar las peticiones
$wiki = new mwApi("Usuario", "Contraseña","http://es.wikipedia.org/w/","PHP test bot");	

/*** Ejemplo 1: Crear una nueva sección en un artículo ***/
	// Datos de lo que realizaremos en el artículo
	$articulo=urlencode("Prueba1"); // Nombre del artículo
	$sectiontitle=urlencode("Prueba del bot"); // Título de la nueva sección que agregaremos
	$text=urlencode("Beep, Boop. Esta es una prueba del bot!"); // Texto  que agregaremos
	$summary=urlencode("Prueba del bot"); // Resumen de la edición
	
	$edittoken = $wiki->get_token("edit"); // Obtenemos un token de edición. Los posibles tokens son:
											# block, delete, edit, email, import, move, options, patrol, protect, unblock, watch, rollback y undelete
	
	// Aqui los parametros que enviaremos a la  API con lo que haremos.
	$post = "title=$articulo&action=edit&section=new&sectiontitle=$sectiontitle&text=$text&token=$edittoken&summary=$summary&bot=true";
	
	// Se envía la petición al servidor mediante la función callApi. Esta tiene dos parámetros:
	  # Los datos que se enviarán y el método que se usará (1 o true para usar GET y 0 o false para usar POST)
	print_r($wiki->callApi($post,false)); // Aqui ejecutamos e imprimimos los resultados
/*** Fin del primer ejemplo ***/

?>
