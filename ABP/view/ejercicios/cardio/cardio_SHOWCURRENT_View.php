
<?php
    class cardio_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../view/Header.php';
            include '../Functions/cardio_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/cardio_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tiempo'] ?> : <input type = 'text' name = 'tiempo' size = '6' value ='<?php echo ($this->valores['tiempo']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['unidad'] ?> : <input type = 'text' name = 'unidad' size = '1' value ='<?php echo ($this->valores['unidad']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['distancia'] ?> : <input type = 'text' name = 'distancia' size = '6' value ='<?php echo ($this->valores['distancia']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

            </form>
            <a href='../Controller/cardio_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
