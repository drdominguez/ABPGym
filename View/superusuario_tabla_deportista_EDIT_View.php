
<?php
    class superusuario_tabla_deportista_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../Locates/Strings_SPANISH.php';
            include '../View/Header.php';
            include '../Functions/superusuario_tabla_deportista_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'superusuario_tabla_deportista' ?>
            </h1>
                <form name = 'Form' action = 'superusuario_tabla_deportista_Controller.php' method = 'post' onsubmit = 'comprobar_superusuario_tabla_deportista()'>

                    <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value ='<?php echo ($this->valores['dniSuperUsuario']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value ='<?php echo ($this->valores['idTabla']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/superusuario_tabla_deportista_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>