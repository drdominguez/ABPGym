
<?php
    class notificacion_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/notificacion_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idNotificacion'] ?> : <input type = 'text' name = 'idNotificacion' size = '20' value ='<?php echo ($this->valores['idNotificacion']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value ='<?php echo ($this->valores['dniAdministrador']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['Asunto'] ?> : <input type = 'text' name = 'Asunto' size = '50' value ='<?php echo ($this->valores['Asunto']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 50)" ><br>
        <?php echo $strings['contenido'] ?> : <input type = 'text' name = 'contenido' size = '65535' value ='<?php echo ($this->valores['contenido']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value ='<?php echo ($this->valores['fecha']); ?>'  readonly  ></br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/notificacion_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
