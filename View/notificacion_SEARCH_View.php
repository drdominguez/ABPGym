
<?php

    class notificacion_SEARCH{

        function __construct(){ 
            $this->render();
        }   

        function render(){

            include '../Locates/Strings_SPANISH.php';
            include '../Functions/notificacion_DefForm.php';
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Buscar'] . 'notificacion' ?>
            </h1>
            <form name = 'Form' action = 'notificacion_Controller.php' method = 'post' onsubmit = 'comprobar()'>

                <?php echo $strings['idNotificacion'] ?> : <input type = 'text' name = 'idNotificacion' size = '20' value = ''  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value = ''  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['Asunto'] ?> : <input type = 'text' name = 'Asunto' size = '50' value = ''  onblur="esVacio(this)  && comprobarText(this, 50)" ><br>
        <?php echo $strings['contenido'] ?> : <input type = 'text' name = 'contenido' size = '65535' value = ''  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['fecha'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fecha' min = '' max = '' value = ''  ></br>
        

                <input type='submit' name='action' value='SEARCH'><br>
            </form>
    
            <a href='../Controller/notificacion_Controller.php'>Volver</a>
    
<?php
             include '../View/Footer.php';
        } //fin metodo render

    }
?>
