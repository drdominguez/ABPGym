
<?php
    class sesionentrenamiento_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/sesionentrenamiento_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idSesionEntrenamiento'] ?> : <input type = 'text' name = 'idSesionEntrenamiento' size = '20' value ='<?php echo ($this->valores['idSesionEntrenamiento']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value ='<?php echo ($this->valores['comentario']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['duracion'] ?> : <input type = 'text' name = 'duracion' size = '20' value ='<?php echo ($this->valores['duracion']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value ='<?php echo ($this->valores['fecha']); ?>'  readonly  ></br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/sesionentrenamiento_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
