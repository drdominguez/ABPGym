
<?php
    class cardio_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/cardio_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tiempo'] ?> : <input type = 'text' name = 'tiempo' size = '6' value ='<?php echo ($this->valores['tiempo']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['unidad'] ?> : <input type = 'text' name = 'unidad' size = '1' value ='<?php echo ($this->valores['unidad']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['distancia'] ?> : <input type = 'text' name = 'distancia' size = '6' value ='<?php echo ($this->valores['distancia']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/cardio_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
