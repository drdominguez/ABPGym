
<?php
    class superusuario_tabla_deportista_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/superusuario_tabla_deportista_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value ='<?php echo ($this->valores['dniSuperUsuario']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value ='<?php echo ($this->valores['idTabla']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/superusuario_tabla_deportista_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
