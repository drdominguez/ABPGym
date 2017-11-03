
<?php

    class superusuario_ejercicio_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/superusuario_ejercicio_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'superusuario_ejercicio' ?>
            </h1>
            <form name = 'Form' action = 'superusuario_ejercicio_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/superusuario_ejercicio_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
