<?php
  
  include_once '../Functions/Authentication.php';
  if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php"); 
    }else{
        include("../Locates/Strings_SPANISH.php"); 
    }
?>
            
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Desconectar</a>
                    </li>
                    <a href="../Controller/CambioIdioma.php?lang=SPANISH">
                    <img  src="../View/Icons/castellano.png"></a>
                    <a href="../Controller/CambioIdioma.php?lang=ENGLISH">
                    <img  src="../View/Icons/gallego.png"></a>
                    <a href="../Controller/CambioIdioma.php?lang=ENGLISH">
                    <img  src="../View/Icons/ingles.png" width="27" height="28"></a>
                    
                </ul>
            </div>
        </nav>
