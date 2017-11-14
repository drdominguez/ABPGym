
<?php

    class grupo_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/grupo_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'grupo' ?>
            </h1>
            <form name = 'Form' action = 'grupo_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['instalaciones'] ?> : <input type = 'text' name = 'instalaciones' size = '65535' value = ''  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['plazas'] ?> : <input type = 'number' name = 'plazas' min = '' max = '' value = ''  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/grupo_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
