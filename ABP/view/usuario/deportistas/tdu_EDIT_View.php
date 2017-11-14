
<?php
    class tdu_EDIT{
        
        private $valores;

        function __construct($valores){
            $this->valores = $valores;
            $this->render();
        }

        function render(){
            
            include '../locates/Strings_SPANISH.php';
            include '../view/Header.php';
            include '../Functions/tdu_DefForm.php';
       
?>
        
            <h1>
            <?php echo $strings['Modificar'] . 'tdu' ?>
            </h1>
                <form name = 'Form' action = 'tdu_Controller.php' method = 'post' onsubmit = 'comprobar_tdu()'>

                    <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value ='<?php echo ($this->valores['dni']); ?>' required  readonly  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['tarjeta'] ?> : <input type = 'text' name = 'tarjeta' size = '60' value ='<?php echo ($this->valores['tarjeta']); ?>' required  onblur="esVacio(this)  && comprobarText(this, 60)" ><br>
        

                    <input type='submit' name='action' value='EDIT'>
                </form>
                <a href='../Controller/tdu_Controller.php'><?php echo $strings['Volver']; ?>
                </a>

<?php
            include '../view/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>