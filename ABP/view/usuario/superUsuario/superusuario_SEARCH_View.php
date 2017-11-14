
<?php

    class superusuario_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../locates/Strings_SPANISH.php';
            include '../Functions/superusuario_DefForm.php';
            include '../view/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'superusuario' ?>
            </h1>
            <form name = 'Form' action = 'superusuario_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/superusuario_Controller.php'>Volver</a>
    
<?php
             include '../view/Footer.php';
        } //fin metodo render

    }
?>
