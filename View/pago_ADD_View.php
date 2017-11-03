
<?php
     class pago_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'pago' ?>
            </h1>        
            <form name = 'Form' action='../Controller/pago_Controller.php' method='post' onsubmit='return comprobar_pago()'>
        <?php echo $strings['idPago'] ?> : <input type = 'text' name = 'idPago' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['importe'] ?> : <input type = 'text' name = 'importe' size = '22' value = '' required  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value = '' ></br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/pago_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
