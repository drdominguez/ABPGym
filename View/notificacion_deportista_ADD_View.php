
<?php
     class notificacion_deportista_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'notificacion_deportista' ?>
            </h1>        
            <form name = 'Form' action='../Controller/notificacion_deportista_Controller.php' method='post' onsubmit='return comprobar_notificacion_deportista()'>
        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/notificacion_deportista_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
