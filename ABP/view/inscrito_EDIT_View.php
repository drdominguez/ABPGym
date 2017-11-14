
<?php
    class inscrito_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/inscrito_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'inscrito' ?>
            </h1>
                <form name = 'Form' action = 'inscrito_Controller.php' method = 'post' onsubmit = 'comprobar_inscrito()'>

                    <?php echo $strings['idGrupo'] ?> : <input type = 'text' name = 'idGrupo' size = '20' value ='<?php echo ($this->valores['idGrupo']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['dniDeportista'] ?> : <input type = 'text' name = 'dniDeportista' size = '10' value ='<?php echo ($this->valores['dniDeportista']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../controller/inscrito_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>