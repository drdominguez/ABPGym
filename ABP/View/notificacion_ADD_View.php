
<?php
     class notificacion_ADD { 
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
                        <a href="#">notificacion</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Notificacion</div>
                    <div class="card-body">            
            <form name = 'Form' action='../Controller/notificacion_Controller.php' method='post' onsubmit='return comprobar_notificacion()'>
        <?php echo $strings['idNotificacion'] ?> : <input type = 'text' name = 'idNotificacion' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value = '<?php echo $_SESSION['login']; ?>' required readonly onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['Asunto'] ?> : <input type = 'text' name = 'Asunto' size = '50' value = '' required  onblur="esVacio(this)  && comprobarText(this, 50)" ><br>
        <?php echo $strings['contenido'] ?> : <textarea  name = 'contenido' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ></textarea><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value = '' ></br>
        
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
