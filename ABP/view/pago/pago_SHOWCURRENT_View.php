
<?php
    class pago_SHOWCURRENT{
   
        private $valores;
        
        function __construct($valores){
            $this->valores=$valores;
            $this->render();
        }
    
        function render(){
        
            include '../locates/Strings_' . $_SESSION['idioma'] . '.php';
            include '../view/Header.php';
            include '../Functions/pago_DefForm.php';


    ?>
            <form name = 'Form' action = '../Controller/pago_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idPago'] ?> : <input type = 'text' name = 'idPago' size = '20' value ='<?php echo ($this->valores['idPago']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['importe'] ?> : <input type = 'text' name = 'importe' size = '22' value ='<?php echo ($this->valores['importe']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value ='<?php echo ($this->valores['fecha']); ?>' readonly  ></br>
        

            </form>
            <a href='../Controller/pago_Controller.php'><?php echo $strings['Volver']; ?> 
            </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
?>
