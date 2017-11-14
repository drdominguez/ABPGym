
<?php
    class grupo_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/grupo_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'grupo' ?>
            </h1>
                <form name = 'Form' action = 'grupo_Controller.php' method = 'post' onsubmit = 'comprobar_grupo()'>

                    <?php echo $strings['idActividad'] ?> : <input type = 'text' name = 'idActividad' size = '20' value ='<?php echo ($this->valores['idActividad']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['instalaciones'] ?> : <input type = 'text' name = 'instalaciones' size = '65535' value ='<?php echo ($this->valores['instalaciones']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ><br>
        <?php echo $strings['plazas'] ?> : <input type = 'number' name = 'plazas' min = '' max = '' value ='<?php echo ($this->valores['plazas']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/grupo_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>