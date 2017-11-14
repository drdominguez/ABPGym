
<?php
    class entrenador_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../Locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../View/Header.php';
            include '../Functions/entrenador_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/entrenador_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniEntrenador'] ?> : <input type = 'text' name = 'dniEntrenador' size = '10' value ='<?php echo ($this->valores['dniEntrenador']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

            </form>
            <a href='../Controller/entrenador_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
