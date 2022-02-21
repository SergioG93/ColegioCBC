<?php 
require_once 'conexion.php';

function getVideos(){
  $mysqli = getConn();
  $id = $_POST['id_nivel'];
  $query = "SELECT * FROM `t_grados` WHERE id_nivel = $id";
  $result = $mysqli->query($query);
  $videos = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $videos .= "<option value='$row[id_grados]'>$row[grados]</option>";
  }
  return $videos;
}

echo getVideos();

?>