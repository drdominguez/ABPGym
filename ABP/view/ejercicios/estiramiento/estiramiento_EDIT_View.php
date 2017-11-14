
<?php
    class estiramiento_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/estiramiento_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'estiramiento' ?>
            </h1>
                <form name = 'Form' action = 'estiramiento_Controller.php' method = 'post' onsubmit = 'comprobar_estiramiento()'>

                    <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tiempo'] ?> : <input type = 'text' name = 'tiempo' size = '6' value ='<?php echo ($this->valores['tiempo']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['unidad'] ?> : <input type = 'text' name = 'unidad' size = '1' value ='<?php echo ($this->valores['unidad']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['distancia'] ?> : <input type = 'text' name = 'distancia' size = '6' value ='<?php echo ($this->valores['distancia']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/estiramiento_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>