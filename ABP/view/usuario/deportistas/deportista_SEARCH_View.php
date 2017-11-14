
<?php

    class deportista_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../locates/Strings_SPANISH.php';
            include '../Functions/deportista_DefForm.php';
            include '../view/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'deportista' ?>
            </h1>
            <form name = 'Form' action = 'deportista_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/deportista_Controller.php'>Volver</a>
    
<?php
             include '../view/Footer.php';
        } //fin metodo render

    }
?>
