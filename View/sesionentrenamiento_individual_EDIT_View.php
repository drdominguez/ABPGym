
<?php
    class sesionentrenamiento_individual_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/sesionentrenamiento_individual_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'sesionentrenamiento_individual' ?>
            </h1>
                <form name = 'Form' action = 'sesionentrenamiento_individual_Controller.php' method = 'post' onsubmit = 'comprobar_sesionentrenamiento_individual()'>

                    <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idSesionEntrenamiento'] ?> : <input type = 'text' name = 'idSesionEntrenamiento' size = '20' value ='<?php echo ($this->valores['idSesionEntrenamiento']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/sesionentrenamiento_individual_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>