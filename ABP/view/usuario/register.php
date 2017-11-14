

    <?php

    class Register{


        function __construct(){ 
            $this->render();
        }

        function render(){

            include '../view/Header.php'; //header necesita los strings
        ?>
            <h1><?php echo $strings['Registro']; ?></h1> 
            <form name = 'Form' action='../Controller/Register_Controller.php' method='post' onsubmit='return comprobar_usuarios()'>

        <?php echo $strings['dni'] ?> : <input type = 'text' name = 'dni' size = '10' value = '' required  onblur="esVacio(this)  && comprobarText(this, 10)" ><br>
        <?php echo $strings['nombre'] ?> : <input type = 'text' name = 'nombre' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['apellidos'] ?> : <input type = 'text' name = 'apellidos' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['edad'] ?> : <input type = 'number' name = 'edad' min = '' max = '' value = '' required  onblur="esVacio(this)  && comprobarText(this, 4)" ><br>
        <?php echo $strings['contrase�a'] ?> : <input type = 'text' name = 'contrase�a' size = '30' value = '' required  onblur="esVacio(this)  && comprobarText(this, 30)" ><br>
        <?php echo $strings['email'] ?> : <input type = 'text' name = 'email' size = '100' value = '' required  onblur="esVacio(this)  && comprobarText(this, 100)" ><br>
        <?php echo $strings['telefono'] ?> : <input type = 'text' name = 'telefono' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" ><br>
        <?php echo $strings['fechaAlta'] ?> : <input readonly class = 'tcal' type = 'date' name = 'fechaAlta' min = '' max = '' value = '' ></br>
        
             <input type='submit' name='action' value='REGISTER'>

            </form>

            <a href='../Controller/usuario_Controller.php'>Volver </a>
        <?php
            include '../view/Footer.php';
        } //fin metodo render

    } //fin REGISTER

    ?>

    