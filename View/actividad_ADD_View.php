
<?php
     class actividad_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'actividad' ?>
            </h1>        
            <form name = 'Form' action='../Controller/actividad_Controller.php' method='post' onsubmit='return comprobar_actividad()'>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['precio'] ?> : <input type = 'text' name = 'precio' size = '22' value = '' required  onblur="esVacio(this)  && comprobarText(this, 22)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/actividad_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
