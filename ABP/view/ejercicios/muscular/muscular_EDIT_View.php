
<?php
    class muscular_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/muscular_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'muscular' ?>
            </h1>
                <form name = 'Form' action = 'muscular_Controller.php' method = 'post' onsubmit = 'comprobar_muscular()'>

                    <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['carga'] ?> : <input type = 'text' name = 'carga' size = '6' value ='<?php echo ($this->valores['carga']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['repeticiones'] ?> : <input type = 'text' name = 'repeticiones' size = '6' value ='<?php echo ($this->valores['repeticiones']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/muscular_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>