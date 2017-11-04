
<?php
    class usuario_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
      function render(){
        
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
                        <a href="../Controller/usuario_Controller.php"><?php echo $strings['Usuarios'] ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $strings['Ver usuario actual'] ?></li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> <?php echo $strings['Mostrar un usuario'] ?></div>
                    <div class="card-body">
            <form name = 'Form' action = '../Controller/usuarios_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <b><?php echo $strings['dni'] ?> :</b> <?php echo ($this->valores['dni']); ?><br>
        <b><?php echo $strings['nombre'] ?> :</b> <?php echo ($this->valores['nombre']); ?><br>
        <b><?php echo $strings['apellidos'] ?> :</b> <?php echo ($this->valores['apellidos']); ?><br>
        <b><?php echo $strings['edad'] ?> :</b> <?php echo ($this->valores['edad']); ?><br>  
        <b><?php echo $strings['contrasena'] ?> :</b> <?php echo ($this->valores['contrasena']); ?><br> 
        <b><?php echo $strings['email'] ?> :</b> <?php echo ($this->valores['email']); ?><br> 
        <b><?php echo $strings['telefono'] ?> :</b> <?php echo ($this->valores['telefono']); ?><br> 
        <b><?php echo $strings['fechaAlta'] ?> :</b> <?php echo ($this->valores['fechaAlta']); ?><br> 

            </form>
            <button type="button" onclick="window.location.href='../Controller/usuario_Controller.php'" class="btn btn-primary"><?php echo $strings['Volver']; ?></button> 
            

        </div>
    </div>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
