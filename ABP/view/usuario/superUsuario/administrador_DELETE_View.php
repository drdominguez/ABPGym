
<?php
    class administrador_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../view/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/administrador_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value ='<?php echo ($this->valores['dniAdministrador']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/administrador_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
