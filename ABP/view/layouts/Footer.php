<html>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © ABP_G42 (Adrián, Juan Ramón, Daniel y Álexandre)</small>
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
                            <h5 class="modal-title" id="exampleModalLabel"><?= i18n("¿Seguro que desea salir?") ?>
                            </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body"><?= i18n("Seleccione Salir si desea cerrar sesión") ?></div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?= i18n("Cancelar") ?></button>
                            <a class="btn btn-primary" href="index.php?controller=Login&amp;action=logout"><?= i18n("Salir") ?></a>
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
            <!--<script src="./view/vendor/chart.js/Chart.min.js"></script>-->
            <?php if($_GET['action']=='NotificacionListar'){?>
            <script src="./view/vendor/datatables/jquery.dataTables2.js"></script>
        <?php }else{
                if(($_GET['action'] == 'TablaADD') || ($_GET['action'] == 'TablaEDIT') || ($_GET['action'] == 'NotificacionADD') || ($_GET['action'] == 'actividadAsignar')){ ?>
            <script src="./view/vendor/datatables/jquery.dataTables3.js"></script>
           <?php }else{ ?>
           <script src="./view/vendor/datatables/jquery.dataTables.js"></script>
        <?php }
            }
        ?>
            <script src="./view/vendor/datatables/dataTables.bootstrap4.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="./view/js/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="./view/js/sb-admin-datatables.min.js"></script>
            <!--<script src="./view/js/sb-admin-charts.min.js"></script>-->
        </div>
    </body>
</html>