
<?php
    class administrador_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../Locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../View/Header.php';
            include '../Functions/administrador_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/administrador_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value ='<?php echo ($this->valores['dniAdministrador']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

            </form>
            <a href='../Controller/administrador_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
