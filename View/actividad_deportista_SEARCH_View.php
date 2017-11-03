
<?php

    class actividad_deportista_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/actividad_deportista_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'actividad_deportista' ?>
            </h1>
            <form name = 'Form' action = 'actividad_deportista_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/actividad_deportista_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
