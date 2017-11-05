<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 
<?php
 class usuario_ADD {
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
         include '../View/Header.php'; //header necesita los strings
            include '../View/menuLateral.php';
  include '../View/notificacionesMenu.php';
                include '../View/menuSuperior.php';
?>
           
<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../Controller/usuario_Controller.php">Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Usuario</div>
                    <div class="card-body">      
            <form name = 'Form' id="form1" action='../Controller/usuario_Controller.php' method='post' onsubmit='return comprobar_usuario()'>
               <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="dni"><?php echo $strings['dni'] ?> : </label>
                    <input class="form-control" type = 'text' name = 'dni' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" >
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="nombre"><?php echo $strings['nombre'] ?> : </label>
                    <input class="form-control" type = 'text' name = 'nombre' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" >
                </div>
                </div>
                  </div>
                   <div class="form-group">
                   <div class="form-row">
                <div class="col-md-6">
                <label for="apellidos"><?php echo $strings['apellidos'] ?> : </label>
               <input class="form-control"  type = 'text' name = 'apellidos' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" >
              </div>
                </div>
            </div>
        <div class="form-group">
                <div class="form-row">
              <div class="col-md-6">
                <label for="edad"> <?php echo $strings['edad'] ?> : </label>
               <input class="form-control" type = 'text' name = 'edad' min = '' max = '' value = '' required  onblur="esVacio(this)  && comprobarText(this, 4)" >
            </div>
      </div>
  </div>
                     <div class="form-group">
                   <div class="form-row">
                <div class="col-md-6">
                <label for="contrasena"><?php echo $strings['contrasena'] ?> : </label>
               <input class="form-control" type = 'text' name = 'contrasena' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" >
              </div>
                </div>
            </div>
        <div class="form-group">
                <div class="form-row">
              <div class="col-md-6">
                <label for="email"> <?php echo $strings['email'] ?> : </label>
               <input  class="form-control" type = 'text' name = 'email' size = '100' value = '' required  onblur="esVacio(this)  && comprobarText(this, 100)" >
            </div>
      </div>
  </div>
       <div class="form-group">
                   <div class="form-row">
                <div class="col-md-6">
                <label for="telefono"><?php echo $strings['telefono'] ?> : </label>
               <input  class="form-control" type = 'text' name = 'telefono' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" >
              </div>
              </div>
      </div>
     <br>

         </form>
                <button type="button" onclick="window.location.href='../Controller/usuario_Controller.php?action=default'" class="btn btn-default"><?php echo $strings['Volver']; ?></button> 
            <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary"><?php echo $strings['Insertar']; ?></button> 
       </div>
    </div>
<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>