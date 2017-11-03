
<?php
    class grupo_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/grupo_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['instalaciones'] ?> : <input type = 'text' name = 'instalaciones' size = '65535' value ='<?php echo ($this->valores['instalaciones']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['plazas'] ?> : <input type = 'number' name = 'plazas' min = '' max = '' value ='<?php echo ($this->valores['plazas']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/grupo_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
