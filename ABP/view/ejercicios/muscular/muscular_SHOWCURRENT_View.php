
<?php
    class muscular_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../view/Header.php';
            include '../Functions/muscular_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/muscular_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['carga'] ?> : <input type = 'text' name = 'carga' size = '6' value ='<?php echo ($this->valores['carga']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['repeticiones'] ?> : <input type = 'text' name = 'repeticiones' size = '6' value ='<?php echo ($this->valores['repeticiones']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

            </form>
            <a href='../Controller/muscular_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
