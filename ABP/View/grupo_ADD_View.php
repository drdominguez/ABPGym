
<?php
     class grupo_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'grupo' ?>
            </h1>        
            <form name = 'Form' action='../Controller/grupo_Controller.php' method='post' onsubmit='return comprobar_grupo()'>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['instalaciones'] ?> : <input type = 'text' name = 'instalaciones' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['plazas'] ?> : <input type = 'number' name = 'plazas' min = '' max = '' value = '' required  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/grupo_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
