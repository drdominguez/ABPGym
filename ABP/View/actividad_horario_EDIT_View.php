
<?php
    class actividad_horario_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/actividad_horario_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'actividad_horario' ?>
            </h1>
                <form name = 'Form' action = 'actividad_horario_Controller.php' method = 'post' onsubmit = 'comprobar_actividad_horario()'>

                    <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idHorario'] ?> : <input type = 'text' name = 'idHorario' size = '20' value ='<?php echo ($this->valores['idHorario']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/actividad_horario_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>