
<?php
     class individual_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../view/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'individual' ?>
            </h1>        
            <form name = 'Form' action='../Controller/individual_Controller.php' method='post' onsubmit='return comprobar_individual()'>
        <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/individual_Controller.php'>Volver </a>
<?php
            include '../view/Footer.php';
        
        } //fin metodo render

    }
?>
