
<?php
    class entrenador_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../view/Header.php';
            include '../Functions/entrenador_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/entrenador_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniEntrenador'] ?> : <input type = 'text' name = 'dniEntrenador' size = '10' value ='<?php echo ($this->valores['dniEntrenador']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

            </form>
            <a href='../Controller/entrenador_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
