
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
                        <a href="#">Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Usuario</div>
                    <div class="card-body">      
            <form name = 'Form' action='../Controller/usuario_Controller.php' method='post' onsubmit='return comprobar_usuario()'>
        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['apellidos'] ?> : <input type = 'text' name = 'apellidos' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['edad'] ?> : <input type = 'number' name = 'edad' min = '' max = '' value = '' required  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        <?php echo $strings['contraseña'] ?> : <input type = 'text' name = 'contraseña' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['email'] ?> : <input type = 'text' name = 'email' size = '100' value = '' required  onblur="esVacio(this)  && comprobarText(this, 100)" ><br>
        <?php echo $strings['telefono'] ?> : <input type = 'text' name = 'telefono' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fechaAlta'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fechaAlta' min = '' max = '' value = '' ></br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
       
        </div>
    </div>
            
                
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
