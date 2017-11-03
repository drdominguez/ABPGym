
<?php
     class deportista_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'deportista' ?>
            </h1>        
            <form name = 'Form' action='../Controller/deportista_Controller.php' method='post' onsubmit='return comprobar_deportista()'>
        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/deportista_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
