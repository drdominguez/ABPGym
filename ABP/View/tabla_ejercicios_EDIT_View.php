
<?php
    class tabla_ejercicios_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/tabla_ejercicios_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'tabla_ejercicios' ?>
            </h1>
                <form name = 'Form' action = 'tabla_ejercicios_Controller.php' method = 'post' onsubmit = 'comprobar_tabla_ejercicios()'>

                    <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value ='<?php echo ($this->valores['idTabla']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/tabla_ejercicios_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>