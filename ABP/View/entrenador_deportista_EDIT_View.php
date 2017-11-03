
<?php
    class entrenador_deportista_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/entrenador_deportista_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'entrenador_deportista' ?>
            </h1>
                <form name = 'Form' action = 'entrenador_deportista_Controller.php' method = 'post' onsubmit = 'comprobar_entrenador_deportista()'>

                    <?php echo $strings['dniEntrenador'] ?> : <input type = 'text' name = 'dniEntrenador' size = '10' value ='<?php echo ($this->valores['dniEntrenador']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/entrenador_deportista_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>