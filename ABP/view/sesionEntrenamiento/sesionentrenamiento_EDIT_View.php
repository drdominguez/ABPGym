
<?php
    class sesionentrenamiento_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/sesionentrenamiento_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'sesionentrenamiento' ?>
            </h1>
                <form name = 'Form' action = 'sesionentrenamiento_Controller.php' method = 'post' onsubmit = 'comprobar_sesionentrenamiento()'>

                    <?php echo $strings['idSesionEntrenamiento'] ?> : <input type = 'text' name = 'idSesionEntrenamiento' size = '20' value ='<?php echo ($this->valores['idSesionEntrenamiento']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value ='<?php echo ($this->valores['comentario']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['duracion'] ?> : <input type = 'text' name = 'duracion' size = '20' value ='<?php echo ($this->valores['duracion']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value ='<?php echo ($this->valores['fecha']); ?>' ></br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/sesionentrenamiento_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>