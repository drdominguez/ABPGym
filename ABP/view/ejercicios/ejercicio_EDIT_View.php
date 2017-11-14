
<?php
    class ejercicio_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/ejercicio_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'ejercicio' ?>
            </h1>
                <form name = 'Form' action = 'ejercicio_Controller.php' method = 'post' onsubmit = 'comprobar_ejercicio()'>

                    <?php echo $strings['idEjercicio'] ?> : <input type = 'text' name = 'idEjercicio' size = '20' value ='<?php echo ($this->valores['idEjercicio']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '60' value ='<?php echo ($this->valores['nombre']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        <?php echo $strings['descripcion'] ?> : <input type = 'text' name = 'descripcion' size = '65535' value ='<?php echo ($this->valores['descripcion']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['video'] ?> : <input type = 'text' name = 'video' size = '1' value ='<?php echo ($this->valores['video']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['imagen'] ?> : <input type = 'text' name = 'imagen' size = '1' value ='<?php echo ($this->valores['imagen']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/ejercicio_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>