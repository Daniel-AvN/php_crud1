<?php include 'template/header.php'; ?>

<?php
    if(!isset($_GET['codigo']) ){
        header("Location: index.php?mensaje=error");
        exit();
    }

    include_once 'model/conexion.php';
    $codigo= $_GET['codigo'];

    $sentencia = $bd->prepare("select * from persona where codigo = ?;");
    $sentencia->execute([$codigo]);

    $persona = $sentencia->fetch(PDO::FETCH_OBJ); //dar formato a $persona

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
         <div class="card">
           <div class="card-header">
              editar datos
           </div>
           <form  class="p-4" method="POST" action="editarProceso.php">
              <div class="mb-3">
                 <label class="form-label">nombre:</label>
                 <input type="text" class="form-control" value="<?php echo $persona->nombre; ?>" required name="txtNombre" >
              </div>
              <div class="mb3">
                 <label class="form-label">edad:</label>
                 <input type="number" class="form-control" value="<?php echo $persona->edad; ?>" required min="1" max="100" name="txtEdad" >
              </div>
              <div class="mb3">
                 <label class="form-label">signo:</label>
                 <input type="text" class="form-control" value="<?php echo $persona->signo; ?>"  required name="txtSigno" >
              </div>
               <div class="d-grid mt-3">
                  <input type="hidden" name="codigo" value="<?php echo $persona->codigo?>">
                  <input type="submit" class="btn btn-primary" value="editar">
               </div>
           </form>
         </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>

