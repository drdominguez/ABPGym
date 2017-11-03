
<?php
    class notificacion_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/notificacion_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'notificacion' ?>
            </h1>
                <form name = 'Form' action = 'notificacion_Controller.php' method = 'post' onsubmit = 'comprobar_notificacion()'>

                    <?php echo $strings['idNotificacion'] ?> : <input type = 'text' name = 'idNotificacion' size = '20' value ='<?php echo ($this->valores['idNotificacion']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value ='<?php echo ($this->valores['dniAdministrador']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['Asunto'] ?> : <input type = 'text' name = 'Asunto' size = '50' value ='<?php echo ($this->valores['Asunto']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 50)" ><br>
        <?php echo $strings['contenido'] ?> : <input type = 'text' name = 'contenido' size = '65535' value ='<?php echo ($this->valores['contenido']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value ='<?php echo ($this->valores['fecha']); ?>' ></br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/notificacion_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>