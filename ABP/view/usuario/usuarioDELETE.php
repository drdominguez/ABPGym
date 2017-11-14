
<?php
    class usuario_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

       function render(){

            include '../view/Header.php';
            include '../view/menuLateral.php';
            include '../view/notificacionesMenu.php';
            include '../view/menuSuperior.php';
                        
?>
           
<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">DELETE</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Eliminar Usuario</div>
                    <div class="card-body">    
            <form name = 'Form' id="form1" action = '../Controller/usuario_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        
                <b><?php echo $strings['dni'] ?></b> : <?php echo ($this->valores['dni']); ?>
                <input type="hidden" name="dni" value="<?php echo ($this->valores['dni']); ?>" ><br>
        <b><?php echo $strings['nombre'] ?></b> : <?php echo ($this->valores['nombre']); ?>
        <input type="hidden" name="nombre" value="<?php echo ($this->valores['nombre']); ?>" ><br>
        <b><?php echo $strings['apellidos'] ?> :</b> <?php echo ($this->valores['apellidos']); ?>
        <input type="hidden" name="apellidos" value="<?php echo ($this->valores['apellidos']); ?>" ><br>
        <b><?php echo $strings['edad'] ?> :</b> <?php echo ($this->valores['edad']); ?>
        <input type="hidden" name="edad" value="<?php echo ($this->valores['edad']); ?>" ><br>
        <!--
        <b><?php echo $strings['contrasena'] ?> :</b> <?php echo ($this->valores['contrasena']); ?>
        <input type="hidden" name="contrasena" value="<?php echo ($this->valores['contrasena']); ?>" ><br>-->
        <b><?php echo $strings['email'] ?> :</b> <?php echo ($this->valores['email']); ?>
        <input type="hidden" name="email" value="<?php echo ($this->valores['email']); ?>" ><br>
        <b><?php echo $strings['telefono'] ?> :</b> <?php echo ($this->valores['telefono']); ?>
        <input type="hidden" name="telefono" value="<?php echo ($this->valores['telefono']); ?>" ><br>
        <b><?php echo $strings['fechaAlta'] ?> :</b> <?php echo ($this->valores['fechaAlta']); ?>
        <input type="hidden" name="fechaAlta" value="<?php echo ($this->valores['fechaAlta']); ?>" ><br>  
          
            </form>
            <button type="button" onclick="window.location.href='../Controller/usuario_Controller.php?action=default'" class="btn btn-default"><?php echo $strings['Volver']; ?></button> 
            <button type='submit' name='action' form="form1" value='DELETE' class="btn btn-primary"><?php echo $strings['Borrar']; ?></button> 

                 
               </div>
    </div>
            
<?php
         include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
