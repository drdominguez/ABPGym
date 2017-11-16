<?php
/*  
include_once '../Functions/Authentication.php';
  if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php");
        else if(strcmp($_SESSION['lang'], 'GALICIAN')==0)
        include("../Locates/Strings_GALICIAN.php"); 
    }else{
        include("../Locates/Strings_GALICIAN.php"); 
    }*/
?>

 <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © ABP_G42 2017</small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seguro que desea salir
                            </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">'Seleccione "Salir" si desea cerrar sesion.'</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" href="index.php?controller=Login&amp;action=logout">Salir</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bootstrap core JavaScript-->
            <script src="./view/vendor/jquery/jquery.min.js"></script>
            <script src="./view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="./view/vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- Page level plugin JavaScript-->
            <script src="./view/vendor/chart.js/Chart.min.js"></script>
            <?php if(substr($_SERVER['REQUEST_URI'], -27)=='notificacion_Controller.php'){?>
            <script src="./view/vendor/datatables/jquery.dataTables2.js"></script>
        <?php }else{ ?>
            <script src="./view/vendor/datatables/jquery.dataTables.js"></script>
        <?php }
        ?>
            
            <script src="./view/vendor/datatables/dataTables.bootstrap4.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="./view/js/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="./view/js/sb-admin-datatables.min.js"></script>
            <script src="./view/js/sb-admin-charts.min.js"></script>
        </div>
    </body>

    </html>
