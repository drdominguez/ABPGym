
<?php
    class actividad_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/actividad_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'actividad' ?>
            </h1>
                <form name = 'Form' action = 'actividad_Controller.php' method = 'post' onsubmit = 'comprobar_actividad()'>

                    <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['precio'] ?> : <input type = 'text' name = 'precio' size = '22' value ='<?php echo ($this->valores['precio']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/actividad_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>