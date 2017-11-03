
<?php
     class sesionentrenamiento_tabla_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'sesionentrenamiento_tabla' ?>
            </h1>        
            <form name = 'Form' action='../Controller/sesionentrenamiento_tabla_Controller.php' method='post' onsubmit='return comprobar_sesionentrenamiento_tabla()'>
        <?php echo $strings['idSesionEntrenamiento'] ?> : <input type = 'text' name = 'idSesionEntrenamiento' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/sesionentrenamiento_tabla_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
