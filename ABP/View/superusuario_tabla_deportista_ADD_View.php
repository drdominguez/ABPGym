
<?php
     class superusuario_tabla_deportista_ADD { 
        function __construct(){ 
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
?>
            <h1>
            <?php echo $strings['Insertar'] . 'superusuario_tabla_deportista' ?>
            </h1>        
            <form name = 'Form' action='../Controller/superusuario_tabla_deportista_Controller.php' method='post' onsubmit='return comprobar_superusuario_tabla_deportista()'>
        <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                <input type='submit' name='action' value='ADD'>
            </form>
            <a href='../Controller/superusuario_tabla_deportista_Controller.php'>Volver </a>
<?php
            include '../View/Footer.php';
        
        } //fin metodo render

    }
?>
