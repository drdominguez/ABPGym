
<?php
    class tabla_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../view/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/tabla_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value ='<?php echo ($this->valores['idTabla']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tipo'] ?> : <input type = 'text' name = 'tipo' size = '1' value ='<?php echo ($this->valores['tipo']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value ='<?php echo ($this->valores['comentario']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/tabla_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
