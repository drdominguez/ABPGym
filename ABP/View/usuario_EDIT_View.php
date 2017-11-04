
<?php
    class usuario_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
             
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
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
                    <li class="breadcrumb-item active">EDIT</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Modificar Usuario</div>
                    <div class="card-body">    
                <form name = 'Form' action = '../Controller/usuario_Controller.php' method = 'post' onsubmit = 'comprobar_usuario()'>

                    <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value ='<?php echo ($this->valores['dni']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '30' value ='<?php echo ($this->valores['nombre']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['apellidos'] ?> : <input type = 'text' name = 'apellidos' size = '30' value ='<?php echo ($this->valores['apellidos']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['edad'] ?> : <input type = 'number' name = 'edad' min = '' max = '' value ='<?php echo ($this->valores['edad']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        <?php echo $strings['contrasena'] ?> : <input type = 'text' name = 'contraseña' size = '30' value ='<?php echo ($this->valores['contrasena']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['email'] ?> : <input type = 'text' name = 'email' size = '100' value ='<?php echo ($this->valores['email']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 100)" ><br>
        <?php echo $strings['telefono'] ?> : <input type = 'text' name = 'telefono' size = '20' value ='<?php echo ($this->valores['telefono']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fechaAlta'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fechaAlta' min = '' max = '' value ='<?php echo ($this->valores['fechaAlta']); ?>' ></br>
        
                </form>
                <button type="button" onclick="window.location.href='../Controller/usuario_Controller.php?action=default'" class="btn btn-default"><?php echo $strings['Volver']; ?></button> 
            <button type='submit' name='action' form="form1" value='EDIT' class="btn btn-primary"><?php echo $strings['Modificar']; ?></button> 
       </div>
    </div>
<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>