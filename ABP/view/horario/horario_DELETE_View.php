
<?php
    class horario_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../view/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/horario_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idHorario'] ?> : <input type = 'text' name = 'idHorario' size = '20' value ='<?php echo ($this->valores['idHorario']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['localizacion'] ?> : <input type = 'text' name = 'localizacion' size = '250' value ='<?php echo ($this->valores['localizacion']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 250)" ><br>
        <?php echo $strings['dia'] ?> : <input type = 'text' name = 'dia' size = '10' value ='<?php echo ($this->valores['dia']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['hora'] ?> : <input type = 'text' name = 'hora' size = '25' value ='<?php echo ($this->valores['hora']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 25)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/horario_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
