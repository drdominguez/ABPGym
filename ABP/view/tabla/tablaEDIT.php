
<?php
    class tabla_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/tabla_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'tabla' ?>
            </h1>
                <form name = 'Form' action = 'tabla_Controller.php' method = 'post' onsubmit = 'comprobar_tabla()'>

                    <?php echo $strings['idTabla'] ?> : <input type = 'text' name = 'idTabla' size = '20' value ='<?php echo ($this->valores['idTabla']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['tipo'] ?> : <input type = 'text' name = 'tipo' size = '1' value ='<?php echo ($this->valores['tipo']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 1)" ><br>
        <?php echo $strings['comentario'] ?> : <input type = 'text' name = 'comentario' size = '65535' value ='<?php echo ($this->valores['comentario']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/tabla_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>