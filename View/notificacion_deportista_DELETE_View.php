
<?php
    class notificacion_deportista_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/notificacion_deportista_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value ='<?php echo ($this->valores['dniAdministrador']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/notificacion_deportista_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
