
<?php
    class administrador_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/administrador_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'administrador' ?>
            </h1>
                <form name = 'Form' action = 'administrador_Controller.php' method = 'post' onsubmit = 'comprobar_administrador()'>

                    <?php echo $strings['dniAdministrador'] ?> : <input type = 'text' name = 'dniAdministrador' size = '10' value ='<?php echo ($this->valores['dniAdministrador']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/administrador_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>