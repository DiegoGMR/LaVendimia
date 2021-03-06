<?PHP

	$respuesta = array();
	
	$query = "SELECT 
					id_articulo, descripcion, modelo, precio, existencia, fecha_creacion, estatus 
				FROM 
					articulo";
					
	if($stmt = $mysqli->prepare($query)){
		
		$stmt->execute();
		
		$stmt->bind_result($id_articulo, $descripcion, $modelo, $precio, $existencia, $fecha_creacion, $estatus);
		
		while($stmt->fetch()){
			
			$respuesta[] = array(
				"id_articulo" => $id_articulo,
				"descripcion" => $descripcion,
				"modelo" => $modelo,
				"precio" => $precio,
				"existencia" => $existencia,
				"fecha_creacion" => $fecha_creacion,
				"estatus" => $estatus
			);
			
		}
		
		$stmt->close();
	}
	
	return $respuesta;

?>