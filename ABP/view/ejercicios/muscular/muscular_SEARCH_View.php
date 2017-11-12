
<?php

    class muscular_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/muscular_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'muscular' ?>
            </h1>
            <form name = 'Form' action = 'muscular_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['carga'] ?> : <input type = 'text' name = 'carga' size = '6' value = ''  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['repeticiones'] ?> : <input type = 'text' name = 'repeticiones' size = '6' value = ''  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/muscular_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
