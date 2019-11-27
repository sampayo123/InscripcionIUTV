<?php

require '../include/conexion.php';
require '../include/ver.php';



if(isset($_GET['cedula'])){

    $sql="SELECT * FROM usuarios WHERE cedula=:cedula";

    try{
        $estado = $con->prepare($sql);
     
        $estado->bindValue(':cedula',$_GET['cedula']);
        $estado->execute();

        $obtUser = $estado->fetch(PDO::FETCH_ASSOC);
     
    }catch(PDOExeption $e){
        print "Error: " .$e->getMessage()."<br/>";
        die();
    }


}else{
    echo "se necesita un id";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inscripcion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>
<header><?php include '../menu/menu1.php' ?></header>

<form action="" method="POST">

  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputCedula">Cedula</label>
      <input type="text" class="form-control" id="inputCedula" placeholder="Cedula" name="cedula" value="<?php echo $obtUser['cedula']?>"  readonly="readonly" required autofocus>
    </div>
    <div class="form-group col-md-3">
      <label for="inputNombre">Nombre</label>
      <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="nombre" readonly="readonly" required
                 autofocus value="<?php echo $obtUser['nombre']?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputApellido">Apellido</label>
      <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" name="apellido" readonly="readonly" required autofocus value="<?php echo $obtUser['apellido']?>">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Promedio</label>
      <input type="number" class="form-control" id="inputPromedio" min="1" max="20" name="promedio" readonly="readonly" required value="<?php echo $obtUser['idpromedio']?>">
    </div>
    <div class="form-group col-md-4">
    <label for="inputCarrera2">Carrera</label>
    <input type="text" class="form-control" id="inputCarrera" placeholder="Carrera" name="carrera" readonly="readonly" required value="<?php echo $obtUser['carrera']?>">
  </div>
    <div class="form-group">
    <label for="inputFecha">Fecha</label>
    <input type="timestamp" class="form-control" id="inputFecha"  readonly="readonly" name="fecha" value="<?php foreach($r as $dato){
    echo  $dato['fecha_inscripcion'];
      } ?>">
  </div>
  <?php include '../include/ver.php';
     
     
    ?>
  <div class="form-group col-md-4">
    <label for="exampleFormControlTextarea1">Materias inscritas</label>
    <
      <?php foreach($r as $dato){ ?>
      <br>
        <input type='checkbox' name='materia[]' value='1' checked disabled> <?= $dato['descripcion'] ?> 
       <?php } ?>
 
  </div>
  </div>
  <div class="form-group col-md-3">
    <label for="inputContraseña">Imprimir</label><br>
    <img src="../src/icon-impresora.png"  width="25" heigt="25" class="d-inline-block align-top" onclick="location.href='../reporte/imprimir.php?cedula=<?php echo $obtUser['cedula'] ?>'">
    </div>

  
</form>



</body>
</html>