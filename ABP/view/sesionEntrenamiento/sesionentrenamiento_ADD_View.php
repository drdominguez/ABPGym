
<?php
     class sesionentrenamiento_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'sesionentrenamiento' ?>
            </h1>        
            <form name = 'Form' action='../Controller/sesionentrenamiento_Controller.php' method='post' onsubmit='return comprobar_sesionentrenamiento()'>
        <?php echo $strings['idSesionEntrenamiento'] ?> : <input type = 'text' name = 'idSesionEntrenamiento' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['duracion'] ?> : <input type = 'text' name = 'duracion' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value = '' ></br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/sesionentrenamiento_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
