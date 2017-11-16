
<?php

    class horario_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../locates/Strings_SPANISH.php';
            include '../Functions/horario_DefForm.php';
            include '../view/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'horario' ?>
            </h1>
            <form name = 'Form' action = 'horario_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idHorario'] ?> : <input type = 'text' name = 'idHorario' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['localizacion'] ?> : <input type = 'text' name = 'localizacion' size = '250' value = ''  onblur="esVacio(this)  && comprobarText(this, 250)" ><br>
        <?php echo $strings['dia'] ?> : <input type = 'text' name = 'dia' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['hora'] ?> : <input type = 'text' name = 'hora' size = '25' value = ''  onblur="esVacio(this)  && comprobarText(this, 25)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/horario_Controller.php'>Volver</a>
    
<?php
             include '../view/Footer.php';
        } //fin metodo render

    }
?>
