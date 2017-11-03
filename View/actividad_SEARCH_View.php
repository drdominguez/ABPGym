
<?php

    class actividad_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/actividad_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'actividad' ?>
            </h1>
            <form name = 'Form' action = 'actividad_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['precio'] ?> : <input type = 'text' name = 'precio' size = '22' value = ''  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/actividad_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
