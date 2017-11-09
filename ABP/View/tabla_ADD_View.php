
<?php
     class tabla_ADD { 
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
                        <a href="../Controller/usuario_Controller.php">Tablas</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Tabla</div>
                    <div class="card-body">      
            <form name = 'Form' id="form1" action='../Controller/tabla_Controller.php' method='post' onsubmit='return comprobar_usuario()'>
               <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="tipo"><?php echo $strings['tipo'] ?> : </label>
                    <input class="form-control" type = 'text' name = 'tipo' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" >
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="nombre"><?php echo $strings['comentario'] ?> : </label>
                   <textarea class="form-control" name = 'comentario' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ></textarea>
                </div>
                </div>
                  </div>
     <br>

         </form>
                <button type="button" onclick="window.location.href='../Controller/tabla_Controller.php?action=default'" class="btn btn-default"><?php echo $strings['Volver']; ?></button> 
            <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary"><?php echo $strings['Insertar']; ?></button> 
       </div>
    </div>
<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>
