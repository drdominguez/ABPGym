
<?php
     class pef_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'pef' ?>
            </h1>        
            <form name = 'Form' action='../Controller/pef_Controller.php' method='post' onsubmit='return comprobar_pef()'>
        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['tarjeta'] ?> : <input type = 'text' name = 'tarjeta' size = '60' value = '' required  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['comentarioRivision'] ?> : <input type = 'text' name = 'comentarioRivision' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/pef_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
