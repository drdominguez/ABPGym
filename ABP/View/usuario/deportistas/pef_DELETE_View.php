
<?php
    class pef_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/pef_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value ='<?php echo ($this->valores['dni']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['tarjeta'] ?> : <input type = 'text' name = 'tarjeta' size = '60' value ='<?php echo ($this->valores['tarjeta']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['comentarioRivision'] ?> : <input type = 'text' name = 'comentarioRivision' size = '65535' value ='<?php echo ($this->valores['comentarioRivision']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/pef_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
