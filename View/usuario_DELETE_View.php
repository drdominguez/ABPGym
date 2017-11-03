
<?php
    class usuario_DELETE{ 
        private $valores;
    
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }

        function render(){

            include '../Locates/Strings_' .$_SESSION['idioma'] . '.php';
            include '../View/Header.php';
                        
?>
      
            <form name = 'Form' action = '../Controller/usuario_Controller.php' method = 'post' onsubmit = 'comprobar()'>   

        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value ='<?php echo ($this->valores['dni']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '30' value ='<?php echo ($this->valores['nombre']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['apellidos'] ?> : <input type = 'text' name = 'apellidos' size = '30' value ='<?php echo ($this->valores['apellidos']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['edad'] ?> : <input type = 'number' name = 'edad' min = '' max = '' value ='<?php echo ($this->valores['edad']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        <?php echo $strings['contraseña'] ?> : <input type = 'text' name = 'contraseña' size = '30' value ='<?php echo ($this->valores['contraseña']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['email'] ?> : <input type = 'text' name = 'email' size = '100' value ='<?php echo ($this->valores['email']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 100)" ><br>
        <?php echo $strings['telefono'] ?> : <input type = 'text' name = 'telefono' size = '20' value ='<?php echo ($this->valores['telefono']); ?>'  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fechaAlta'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fechaAlta' min = '' max = '' value ='<?php echo ($this->valores['fechaAlta']); ?>'  readonly  ></br>
         

                  <input type='submit' name='action' value='DELETE'>
            </form>
            <a href='../Controller/usuario_Controller.php'><?php echo $strings['Volver']; ?> </a>
<?php
         include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
