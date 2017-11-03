
<?php
     class tdu_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'tdu' ?>
            </h1>        
            <form name = 'Form' action='../Controller/tdu_Controller.php' method='post' onsubmit='return comprobar_tdu()'>
        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['tarjeta'] ?> : <input type = 'text' name = 'tarjeta' size = '60' value = '' required  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/tdu_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
