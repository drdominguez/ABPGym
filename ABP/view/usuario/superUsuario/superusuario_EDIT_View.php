
<?php
    class superusuario_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/superusuario_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'superusuario' ?>
            </h1>
                <form name = 'Form' action = 'superusuario_Controller.php' method = 'post' onsubmit = 'comprobar_superusuario()'>

                    <?php echo $strings['dniSuperUsuario'] ?> : <input type = 'text' name = 'dniSuperUsuario' size = '10' value ='<?php echo ($this->valores['dniSuperUsuario']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/superusuario_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>