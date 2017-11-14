
<?php
     class horario_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'horario' ?>
            </h1>        
            <form name = 'Form' action='../Controller/horario_Controller.php' method='post' onsubmit='return comprobar_horario()'>
        <?php echo $strings['idHorario'] ?> : <input type = 'text' name = 'idHorario' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['localizacion'] ?> : <input type = 'text' name = 'localizacion' size = '250' value = '' required  onblur="esVacio(this)  && comprobarText(this, 250)" ><br>
        <?php echo $strings['dia'] ?> : <input type = 'text' name = 'dia' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['hora'] ?> : <input type = 'text' name = 'hora' size = '25' value = '' required  onblur="esVacio(this)  && comprobarText(this, 25)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/horario_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
