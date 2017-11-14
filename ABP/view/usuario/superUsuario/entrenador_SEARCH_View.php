
<?php

    class entrenador_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../locates/Strings_SPANISH.php';
            include '../Functions/entrenador_DefForm.php';
            include '../view/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'entrenador' ?>
            </h1>
            <form name = 'Form' action = 'entrenador_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniEntrenador'] ?> : <input type = 'text' name = 'dniEntrenador' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/entrenador_Controller.php'>Volver</a>
    
<?php
             include '../view/Footer.php';
        } //fin metodo render

    }
?>
