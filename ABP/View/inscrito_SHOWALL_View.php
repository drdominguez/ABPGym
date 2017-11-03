
<?php
    class inscrito_SHOWALL { 

        private $datos;
        private $array; 
        private $volver;

        function __construct($array, $datos){
            $this->datos = $datos;
            $this->lista = $array;
            $this->render();
        }
                
        function render(){  
            include '../View/Header.php';
?>
            <h1>
            <?php echo $strings['Mostrar todos']. ' inscrito'; ?>
            </h1>
            <a href='../Controller/inscrito_Controller.php?action=SEARCH'><img src='../View/Icons/search.png'></a></a>
        
            <a href='../Controller/inscrito_Controller.php?action=ADD'><img src='../View/Icons/add.png'></a></br></br>
            <br><br>
            <table border = 1>
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
?>          
                </tr>
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
                    <a href='../Controller/inscrito_Controller.php?idGrupo=<?php echo $datos['idGrupo']; ?>&dniDeportista=<?php echo $datos['dniDeportista']; ?>&action=EDIT'>
                                    <img src='../View/Icons/edit.png'>
                    
                    </a>
                            
                    </td>

                    <td>
                    <a href='../Controller/inscrito_Controller.php?idGrupo=<?php echo $datos['idGrupo']; ?>&dniDeportista=<?php echo $datos['dniDeportista']; ?>&action=DELETE'>
                                    <img src='../View/Icons/delete.png'>
                    </a>
                    
                    </td>

                    <td>
                    <a href='../Controller/inscrito_Controller.php?idGrupo=<?php echo $datos['idGrupo']; ?>&dniDeportista=<?php echo $datos['dniDeportista']; ?>&action=SHOWCURRENT'>
                                    <img src='../View/Icons/detalle.png'>
                    </a>
                    
                    </td>
                            
                    </tr>
<?php
                    }   
?>
            </table>
        
            <a href='../index.php'><img src='../View/Icons/salir.png'></a>
                  
<?php

            include '../View/Footer.php';
        
        } //render method

    } //main class
?>
