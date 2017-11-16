
<?php
     class administrador_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../view/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'administrador' ?>
            </h1>        
            <form name = 'Form' action='../Controller/administrador_Controller.php' method='post' onsubmit='return comprobar_administrador()'>
        <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/administrador_Controller.php'>Volver </a>
<?php
            include '../view/Footer.php';
        
        } //fin metodo render

    }
?>
