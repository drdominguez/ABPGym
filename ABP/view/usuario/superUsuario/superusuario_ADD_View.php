
<?php
     class superusuario_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../view/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'superusuario' ?>
            </h1>        
            <form name = 'Form' action='../Controller/superusuario_Controller.php' method='post' onsubmit='return comprobar_superusuario()'>
        <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/superusuario_Controller.php'>Volver </a>
<?php
            include '../view/Footer.php';
        
        } //fin metodo render

    }
?>
