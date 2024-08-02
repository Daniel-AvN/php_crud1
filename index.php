<?php include 'template/header.php'; ?>

<?php 
   include_once 'model/conexion.php';
   $sentencia=$bd->query("select * from persona"); //llamamos a la base de datos instanciada
   $persona = $sentencia->fetchAll( PDO::FETCH_OBJ); //dar formato
   // print_r($persona)

   // header('refresh:1');
?>

<div class="container mt-5">
  <div class="row justify-content-center">
     <div class="col-md-7">

     <!-- inicio alerta -->

     <?php 
      if( isset($_GET['mensaje']) && $_GET['mensaje'] == 'falta' ){
     ?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>error!</strong> llena todos los campos
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     <?php } ?>


     <?php  if( isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado' ){     ?>

     <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>registrado!</strong> se agregaron los datos
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     <?php } ?>

<!-- para evitar q el usuario no acceda a editar.php sin haber seleccionado una persona -->
     <?php  if( isset($_GET['mensaje']) && $_GET['mensaje'] == 'error' ){     ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>error!</strong> vuelve a intentar
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>

      <?php  if( isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado' ){     ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>cambiado!</strong> los datos fueron actualizados
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>

      
      <?php  if( isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado' ){     ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>eliminado!</strong> los datos fueron eliminados
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      
     <!-- fin alerta -->

        <div class="card">
            <div class="card-header">
              lista de personas
            </div>
            <div class="p-4">
                <div class="table">
                  <table class="table align-middle">
                     <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">nombre</th>
                          <th scope="col">edad</th>
                          <th scope="col">signo</th>
                          <th scope="col" colspan="2">opciones</th>
                        </tr>
                     </thead>
                     <tbody>

                        <?php
                           foreach($persona as  $dato){
                           
                        ?>
                        
                        <tr>
                          <td scope="row"> <?php echo $dato->codigo ?> </td>
                          <td> <?php echo $dato->nombre ?> </td>
                          <td> <?php echo $dato->edad ?> </td>
                          <td> <?php echo $dato->signo ?> </td>

                          <td> <a href="editar.php?codigo=<?php echo $dato->codigo ?>"> <i class="text-success bi bi-pencil-square"></i> </a> </td>

                          <td> <a onclick="return confirm('estas seguro de eliminarlo?, esta accion no se puede deshacer')" href="eliminar.php?codigo=<?php echo $dato->codigo ?>"> <i class="text-danger bi bi-trash"></i> </a> </td>
                        </tr>
                        
                        <?php
                           }
                        ?>

                     </tbody>
                  </table>

                </div>
                
            </div>
        </div>
     </div>
     <div class="col-md-4">
        <div class="card">
           <div class="card-header">
              ingresar datos
           </div>
           <form  class="p-4" method="POST" action="registrar.php">
              <div class="mb3">
                 <label class="form-label">nombre:</label>
                 <input type="text" class="form-control" required name="txtNombre" autofocus>
              </div>
              <div class="mb3">
                 <label class="form-label">edad:</label>
                 <input type="number" class="form-control" required min="1" max="100" name="txtEdad" >
              </div>
              <div class="mb3">
                 <label class="form-label">signo:</label>
                 <input type="text" class="form-control"  required name="txtSigno" >
              </div>
               <div class="d-grid mt-3">
                  <input type="hidden" name="oculto" value="1">
                  <input type="submit" class="btn btn-primary" value="registrar">
               </div>
           </form>
        </div>
     </div>
  </div>
</div>



<?php include 'template/footer.php'; ?>
