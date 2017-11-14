
<?php
    class inscrito_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../view/Header.php';
                        
?>
      
            <form name = 'Form' action = '../controller/inscrito_Controller.php' method = 'post' onsubmit = 'comprobar()'>

        <?php echo $strings['idGrupo'] ?> : <input type = 'text' name = 'idGrupo' size = '20' value ='<?php echo ($this->valores['idGrupo']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../controller/inscrito_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
