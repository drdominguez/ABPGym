
<?php

    class tabla_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/tabla_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'tabla' ?>
            </h1>
            <form name = 'Form' action = 'tabla_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tipo'] ?> : <input type = 'text' name = 'tipo' size = '1' value = ''  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value = ''  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/tabla_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
