
<?php
     class inscrito_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../view/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'inscrito' ?>
            </h1>        
            <form name = 'Form' action='../controller/inscrito_Controller.php' method='post' onsubmit='return comprobar_inscrito()'>
        <?php echo $strings['idGrupo'] ?> : <input type = 'text' name = 'idGrupo' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../controller/inscrito_Controller.php'>Volver </a>
<?php
            include '../view/Footer.php';
        
        } //fin metodo render

    }
?>
