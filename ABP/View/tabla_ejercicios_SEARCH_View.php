
<?php

    class tabla_ejercicios_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/tabla_ejercicios_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'tabla_ejercicios' ?>
            </h1>
            <form name = 'Form' action = 'tabla_ejercicios_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/tabla_ejercicios_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
