
<?php
     class notificacion_ADD { 

        function __construct($array, $datos){ 

             $this->datos = $datos;
            $this->lista = $array;
            $this->render();
        }
    
        function render(){ 
        
            include '../View/Header.php'; //header necesita los strings
            include '../View/menuLateral.php';
            include '../View/notificacionesMenu.php';
            include '../View/menuSuperior.php';
?>
            
<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">notificacion</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Notificacion</div>
                    <div class="card-body">            
            <form name = 'Form' action='../Controller/notificacion_Controller.php' method='post' onsubmit='return comprobar_notificacion()'>
                <div class="form-group">
                    <div class="form-row">
                    <div class="col-md-6">
                        <label for="idNotificacion"><?php echo $strings['idNotificacion'] ?> : </label>
                        <input class="form-control" type = 'text' name = 'idNotificacion' size = '20' value = '' required  onblur="esVacio(this)  && comprobarText(this, 20)" >
                         </div>
            </div>
        </div>
        <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="dniAdministrador"><?php echo $strings['dniAdministrador'] ?> : </label>
                    <input class="form-control" type = 'text' name = 'dniAdministrador' size = '10' value = '<?php echo $_SESSION['login']; ?>' required readonly onblur="esVacio(this)  && comprobarText(this, 10)" >

                     </div>
            </div>
        </div>
        <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="Asunto"><?php echo $strings['Asunto'] ?> : </label>
                    <input class="form-control" type = 'text' name = 'Asunto' size = '50' value = '' required  onblur="esVacio(this)  && comprobarText(this, 50)" >
                     </div>
            </div>
        </div>
        <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="contenido"><?php echo $strings['contenido'] ?> : </label>
                    <textarea class="form-control" name = 'contenido' size = '65535' value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ></textarea>


                     </div>
            </div>
        </div>
        <br>
        
         

                 
       </div>
    </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> <?php echo $strings['Mostrar todos los usuarios']; ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                    <tr>
                                        <?php
                 foreach($this->lista as $titulo){
?>
                                        <th>
<?php
                                        echo $strings[$titulo];
?>
                                        </th>
<?php
                                    }
    ?>                                  <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <?php
                                     foreach($this->lista as $titulo){
?>
                                        <th>
<?php
                                        echo $strings[$titulo];
?>
                                        </th>
<?php
                                    }
?>                                  <th>
                                        </th>


                                    </tr>
                                </tfoot>
                                <tbody>

<?php
                foreach($this->datos as $datos){
?>
                    <tr>
<?php
                    for($i=0;$i<count($this->lista);$i++){
?>
                        <td>
<?php
                        echo $datos[$this->lista[$i]];
?>
                       
                        </td>
                <?php
                    }   
?>
                        <td>
                            <input type="checkbox" name="enviar[]" value="<?php echo $datos['dni'];?>">
                        </td>           
                        
                    </tr>
<?php
                    }   
?>
            </tbody>
                            </table>
                              </div>
                                 <button type="button" onclick="window.location.href='../Controller/notificacion_Controller.php?action=default'" class="btn btn-default"><?php echo $strings['Volver']; ?></button> 
                                <button  type='submit' name='action' value='ADD' class="btn btn-primary"><?php echo $strings['Insertar']; ?></button>
                                
                    </div>
                </div>
                </form>

<?php
            include '../View/Footer.php';
        } // fin del metodo render
    } // fin de la clase
    ?>
