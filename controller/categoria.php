<?php
header('Content-Type: application/json'); //para que php sepa que vamos a utilizar archivos JSON.

require_once ('../config/conexion.php');
require_once ('../models/categorias.php');

$body = json_decode(file_get_contents("php://input"), true); // Pasar de formato JSON a php y guardarlo en la variable $body.

$categoria = new Categoria();

switch ($_GET["op"]) {
	case "GetAll":
		$datos = $categoria-> obtener_categoria();
		echo json_encode($datos);
		break;

	case "GetId":
		$datos = $categoria-> get_categoria_id($body["cat_id"]);
		echo json_encode($datos);
		break;	

	case "insertCat":
		$datos = $categoria-> insertar_categoria($body["cut_num"], $body["cut_obs"]);
		echo "correcto";
		break;

	case "Update":
		$datos = $categoria-> update_categoria($body["cut_id"], $body["cut_num"], $body["cut_obs"]);
		echo "Actualizado";
		break;

	case "Delete":
		$datos = $categoria-> delete_categoria($body["cut_id"]);
		echo "Eliminado";
		break;				
}
?>