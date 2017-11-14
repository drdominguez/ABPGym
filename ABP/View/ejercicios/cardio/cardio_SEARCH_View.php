
<?php

    class cardio_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/cardio_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'cardio' ?>
            </h1>
            <form name = 'Form' action = 'cardio_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tiempo'] ?> : <input type = 'text' name = 'tiempo' size = '6' value = ''  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['unidad'] ?> : <input type = 'text' name = 'unidad' size = '1' value = ''  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['distancia'] ?> : <input type = 'text' name = 'distancia' size = '6' value = ''  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/cardio_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
