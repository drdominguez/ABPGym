
<?php
    class ejercicio_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../view/Header.php';
            include '../Functions/ejercicio_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/ejercicio_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '60' value ='<?php echo ($this->valores['nombre']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['descripcion'] ?> : <input type = 'text' name = 'descripcion' size = '65535' value ='<?php echo ($this->valores['descripcion']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['video'] ?> : <input type = 'text' name = 'video' size = '1' value ='<?php echo ($this->valores['video']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['imagen'] ?> : <input type = 'text' name = 'imagen' size = '1' value ='<?php echo ($this->valores['imagen']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        

            </form>
            <a href='../Controller/ejercicio_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
