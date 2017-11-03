
<?php
     class tabla_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'tabla' ?>
            </h1>        
            <form name = 'Form' action='../Controller/tabla_Controller.php' method='post' onsubmit='return comprobar_tabla()'>
        <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tipo'] ?> : <input type = 'text' name = 'tipo' size = '1' value = '' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/tabla_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
