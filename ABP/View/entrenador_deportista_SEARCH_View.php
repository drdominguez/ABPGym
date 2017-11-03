
<?php

    class entrenador_deportista_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/entrenador_deportista_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'entrenador_deportista' ?>
            </h1>
            <form name = 'Form' action = 'entrenador_deportista_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['dniEntrenador'] ?> : <input type = 'text' name = 'dniEntrenador' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/entrenador_deportista_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
