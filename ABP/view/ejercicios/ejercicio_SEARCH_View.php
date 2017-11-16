
<?php

    class ejercicio_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../locates/Strings_SPANISH.php';
            include '../Functions/ejercicio_DefForm.php';
            include '../view/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'ejercicio' ?>
            </h1>
            <form name = 'Form' action = 'ejercicio_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '60' value = ''  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['descripcion'] ?> : <input type = 'text' name = 'descripcion' size = '65535' value = ''  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['video'] ?> : <input type = 'text' name = 'video' size = '1' value = ''  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['imagen'] ?> : <input type = 'text' name = 'imagen' size = '1' value = ''  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/ejercicio_Controller.php'>Volver</a>
    
<?php
             include '../view/Footer.php';
        } //fin metodo render

    }
?>
