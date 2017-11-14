
<?php
    class pago_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/pago_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'pago' ?>
            </h1>
                <form name = 'Form' action = 'pago_Controller.php' method = 'post' onsubmit = 'comprobar_pago()'>

                    <?php echo $strings['idPago'] ?> : <input type = 'text' name = 'idPago' size = '20' value ='<?php echo ($this->valores['idPago']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['importe'] ?> : <input type = 'text' name = 'importe' size = '22' value ='<?php echo ($this->valores['importe']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value ='<?php echo ($this->valores['fecha']); ?>' ></br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/pago_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>