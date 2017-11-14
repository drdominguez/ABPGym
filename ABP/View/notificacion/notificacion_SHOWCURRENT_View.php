
<?php
    class notificacion_SHOWCURRENT{
   
        private $valores;
         function __construct($valores,$usuario){
            $this->valores=$valores;
            $this->usuario=$usuario;
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
                        <a href="#">notificacion</a>
                    </li>
                    <li class="breadcrumb-item active">Show Current</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Mostrar una notificación</div>
                    <div class="card-body">
            <form name = 'Form' action = '../Controller/notificacion_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <b><?php echo $strings['idNotificacion'] ?> :</b> <?php echo ($this->valores['idNotificacion']); ?><br>
        <b><?php echo $strings['Asunto'] ?> :</b> <?php echo ($this->valores['Asunto']); ?><br>
          <b><?php echo $strings['dniAdministrador'] ?> :</b> <?php echo ($this->valores['dniAdministrador']); ?><br>
        <b><?php echo $strings['contenido'] ?> :</b> <?php echo ($this->valores['contenido']); ?><br>
        <b><?php echo $strings['fecha'] ?> :</b> <?php echo ($this->valores['fecha']); ?><br>  

            </form>
            <button type="button" onclick="window.location.href='../Controller/notificacion_Controller.php'" class="btn btn-primary"><?php echo $strings['Volver']; ?></button> 
            

        </div>
    </div>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
