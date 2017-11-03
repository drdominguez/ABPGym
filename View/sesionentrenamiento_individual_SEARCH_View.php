
<?php

    class sesionentrenamiento_individual_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/sesionentrenamiento_individual_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'sesionentrenamiento_individual' ?>
            </h1>
            <form name = 'Form' action = 'sesionentrenamiento_individual_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['idSesionEntrenamiento'] ?> : <input type = 'text' name = 'idSesionEntrenamiento' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/sesionentrenamiento_individual_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
