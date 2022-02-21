<?php

$item = null;
$valor = null;
$orden = "id";


?>




<center>


    <div class="t-widget t-grid" id="Mensajes">
    <table cellspacing="0">
    <colgroup>
    <col>
    </colgroup>
    <thead class="t-grid-header">
      <tr>
        <th class="t-header" scope="col">

          </th></tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p style="text-align:center;">
                  <strong>
                    <span style="font-size:large;background-color:#fff200;">INSCRIPCIONES 202101</span>
                      </strong></p>
                        <p>
                          <span style="font-size:large;">El proceso de Reinscripciones 202101 dará inicio en:</span>
                          </p><ul><li><span style="font-size:large;">4 al 26 de febrero de 2021 - Kinder </span><strong><span style="font-size:large;">municipio de Tijuana</span></strong></li><li><span style="font-size:large;">5 al 26 de febrero de 2021 - Primaria y Secundaria </span><strong><span style="font-size:large;">municipio de Tijuana</span></strong><strong></strong><br></li></ul></td></tr></tbody></table><div class="t-grid-pager t-grid-bottom"><div class="t-status">
                          </div></div></div>


                          <section class="content">
                              <div class="container-fluid">
                                  <!-- Small boxes (Stat box) -->
                                  <div class="row">

                                      <!-- ./col -->
                                      <div class="col-lg-3 col-6">
                                          <!-- small box -->
                                          <div class="small-box bg-warning">
                                              <div class="inner">

                                              <?php $total_usuarios = ControladorUsuarios::getTotalUsuarios() ?>
                                                  <h3><?=$total_usuarios['COUNT(*)']?></h3>

                                                  <p>Usuarios registrados</p>
                                              </div>
                                              <div class="icon">
                                                <i class="fa fa-users"></i>
                                              </div>
                                              <a href="usuarios" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
                                          </div>
                                      </div>

                                      <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">

                                    <?php $total_aspirantes = ControladorAspirantes::getTotalAspirantes()?>

                                    <h3><?=$total_aspirantes['COUNT(*)']?></h3>

                                    <p>Aspirantes</p>
                                </div>
                                <div class="icon">
                                  <i class="fa fa-user-circle"></i>
                                </div>
                                <a href="aspirantes" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right" ></i> </a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">

                        <?php $total_aspirantes = ControladorAsignacion::getTotalAsignacion()?>

                        <h3><?=$total_aspirantes['COUNT(*)']?></h3>

                        <p>Alumnos</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-cogs"></i>
                        </div>
                        <a href="asignacion" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right" ></i> </a>
                        </div>
                        </div>


                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">

                        <?php $total_aspirantes = ControladorCategorias::getTotalMaterias()?>

                        <h3><?=$total_aspirantes['COUNT(*)']?></h3>

                        <p>Materias</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-user-circle"></i>
                        </div>
                        <a href="categorias" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right" ></i> </a>
                        </div>
                        </div>

                                  </div>
                                  <!-- /.row -->
                              </div><!-- /.container-fluid -->

                          </section>

</center>
