
<?php

    class pef_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../locates/Strings_SPANISH.php';
            include '../Functions/pef_DefForm.php';
            include '../view/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'pef' ?>
            </h1>
            <form name = 'Form' action = 'pef_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['tarjeta'] ?> : <input type = 'text' name = 'tarjeta' size = '60' value = ''  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['comentarioRivision'] ?> : <input type = 'text' name = 'comentarioRivision' size = '65535' value = ''  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/pef_Controller.php'>Volver</a>
    
<?php
             include '../view/Footer.php';
        } //fin metodo render

    }
?>
