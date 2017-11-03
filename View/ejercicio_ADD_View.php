
<?php
     class ejercicio_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'ejercicio' ?>
            </h1>        
            <form name = 'Form' action='../Controller/ejercicio_Controller.php' method='post' onsubmit='return comprobar_ejercicio()'>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '60' value = '' required  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['descripcion'] ?> : <input type = 'text' name = 'descripcion' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['video'] ?> : <input type = 'text' name = 'video' size = '1' value = '' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['imagen'] ?> : <input type = 'text' name = 'imagen' size = '1' value = '' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/ejercicio_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
