
<?php
    class usuario_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/usuario_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'usuario' ?>
            </h1>
                <form name = 'Form' action = 'usuario_Controller.php' method = 'post' onsubmit = 'comprobar_usuario()'>

                    <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value ='<?php echo ($this->valores['dni']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '30' value ='<?php echo ($this->valores['nombre']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['apellidos'] ?> : <input type = 'text' name = 'apellidos' size = '30' value ='<?php echo ($this->valores['apellidos']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['edad'] ?> : <input type = 'number' name = 'edad' min = '' max = '' value ='<?php echo ($this->valores['edad']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        <?php echo $strings['contraseña'] ?> : <input type = 'text' name = 'contraseña' size = '30' value ='<?php echo ($this->valores['contraseña']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['email'] ?> : <input type = 'text' name = 'email' size = '100' value ='<?php echo ($this->valores['email']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 100)" ><br>
        <?php echo $strings['telefono'] ?> : <input type = 'text' name = 'telefono' size = '20' value ='<?php echo ($this->valores['telefono']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fechaAlta'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fechaAlta' min = '' max = '' value ='<?php echo ($this->valores['fechaAlta']); ?>' ></br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/usuario_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>