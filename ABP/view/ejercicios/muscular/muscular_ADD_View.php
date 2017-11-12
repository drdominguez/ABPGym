
<?php
     class muscular_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'muscular' ?>
            </h1>        
            <form name = 'Form' action='../Controller/muscular_Controller.php' method='post' onsubmit='return comprobar_muscular()'>
        <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['carga'] ?> : <input type = 'text' name = 'carga' size = '6' value = '' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        <?php echo $strings['repeticiones'] ?> : <input type = 'text' name = 'repeticiones' size = '6' value = '' required  onblur="esVacio(this)  && comprobarText(this, 6)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/muscular_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
