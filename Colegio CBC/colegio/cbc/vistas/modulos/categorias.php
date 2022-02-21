
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Materias

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Materias</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

          Agregar Materia

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>id</th>
           <th>Nombre</th>
           <th>Turno</th>
           <th>Nivel</th>
           <th>Clave</th>
           <th>Profesor</th>

           <th>Fecha de alta</th>

           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

          foreach ($categorias as $key => $value) {

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["id"].'</td>
                    <td class="text-uppercase">'.$value["categoria"].'</td>
                    <td class="text-uppercase">'.$value["turno"].'</td>
                    <td class="text-uppercase">'.$value["nivel"].'</td>
                    <td class="text-uppercase">'.$value["clave"].'</td>

                    <td class="text-uppercase">'.$value["profesor"].'</td>

                    <td class="text-uppercase">'.$value["fecha"].'</td>


                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';



                          echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';



                      echo '</div>

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>

            <div class="col-xs-4">
                        <label> Asigna el turno</label>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-sm" name="editarturno" required>

                                    <option value="" id="editarturno"></option>

                                    <option value="VESPERTINO">VESPERTINO</option>

                                    <option value="MATUTINO">MATUTINO</option>


                                </select>

                            </div>

            </div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->

            <div class="col-xs-4">
                        <label> Asigna el nivel</label>
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-sm" name="editarnivel" required>

                                    <option value="" id="editarnivel"></option>

                                    <option value="KINDER">KINDER</option>

                                    <option value="PRIMARIA">PRIMARIA</option>

                                    <option value="SECUNDARIA">SECUNDARIA</option>


                                </select>

                            </div>

            </div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->



            <div class="form-group">
              <label> Ingrese la clave</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarclave" id="editarclave" required>

              </div>

            </div>

            <div class="form-group">
              <label> Ingrese Profesor</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarprofesor" id="editarprofesor" required>


              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php
      if($_SESSION["perfil"] == "Administrador"){

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();
}
        ?>

      </form>

    </div>

  </div>

</div>

<?php
if($_SESSION["perfil"] == "Administrador"){

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();
}
?>
