
<?php
    class horario_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/horario_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'horario' ?>
            </h1>
                <form name = 'Form' action = 'horario_Controller.php' method = 'post' onsubmit = 'comprobar_horario()'>

                    <?php echo $strings['idHorario'] ?> : <input type = 'text' name = 'idHorario' size = '20' value ='<?php echo ($this->valores['idHorario']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['localizacion'] ?> : <input type = 'text' name = 'localizacion' size = '250' value ='<?php echo ($this->valores['localizacion']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 250)" ><br>
        <?php echo $strings['dia'] ?> : <input type = 'text' name = 'dia' size = '10' value ='<?php echo ($this->valores['dia']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['hora'] ?> : <input type = 'text' name = 'hora' size = '25' value ='<?php echo ($this->valores['hora']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 25)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/horario_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>