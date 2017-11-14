
<?php
     class cardio_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../view/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'cardio' ?>
            </h1>        
            <form name = 'Form' action='../Controller/cardio_Controller.php' method='post' onsubmit='return comprobar_cardio()'>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tiempo'] ?> : <input type = 'text' name = 'tiempo' size = '6' value = '' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['unidad'] ?> : <input type = 'text' name = 'unidad' size = '1' value = '' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['distancia'] ?> : <input type = 'text' name = 'distancia' size = '6' value = '' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/cardio_Controller.php'>Volver </a>
<?php
            include '../view/Footer.php';
        
        } //fin metodo render

    }
?>
