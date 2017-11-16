
<?php
    class actividad_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../view/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/actividad_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['precio'] ?> : <input type = 'text' name = 'precio' size = '22' value ='<?php echo ($this->valores['precio']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/actividad_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
