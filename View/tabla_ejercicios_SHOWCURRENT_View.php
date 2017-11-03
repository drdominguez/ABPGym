
<?php
    class tabla_ejercicios_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../Locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../View/Header.php';
            include '../Functions/tabla_ejercicios_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/tabla_ejercicios_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value ='<?php echo ($this->valores['idTabla']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

            </form>
            <a href='../Controller/tabla_ejercicios_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
