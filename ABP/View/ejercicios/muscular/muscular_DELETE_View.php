
<?php
    class muscular_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/muscular_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['carga'] ?> : <input type = 'text' name = 'carga' size = '6' value ='<?php echo ($this->valores['carga']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['repeticiones'] ?> : <input type = 'text' name = 'repeticiones' size = '6' value ='<?php echo ($this->valores['repeticiones']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/muscular_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
