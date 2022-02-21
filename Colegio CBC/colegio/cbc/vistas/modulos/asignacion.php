
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Asignar Grupos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Asignar Grupos</li>


    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">



      </div>

      <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

        <tr>

          <th style="width:10px">#</th>
          <th>Matricula</th>
          <th>Nombres</th>
          <th>Apellido_Paterno</th>
          <th>Apellido_Materno</th>
          <th>Nivel</th>
          <th>Grado</th>
          <th>Grupo</th>
          <th>Genero</th>
          <th>Turno</th>

          <th>Estatus</th>
          <th>Acciones</th>

        </tr>

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $asignacion = ControladorAsignacion::ctrMostrarAsignacion($item, $valor);

          foreach ($asignacion as $key => $value) {

            echo ' <tr>

                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["Matricula"].'</td>
                    <td class="text-uppercase">'.$value["Nombres"].'</td>
                    <td class="text-uppercase">'.$value["Apellido_Paterno"].'</td>
                    <td class="text-uppercase">'.$value["Apellido_Materno"].'</td>
                    <td class="text-uppercase">'.$value["Nivel"].'</td>
                    <td class="text-uppercase">'.$value["Grado"].'</td>
                    <td class="text-uppercase">'.$value["Grupo"].'</td>
                    <td class="text-uppercase">'.$value["genero"].'</td>
                    <td class="text-uppercase">'.$value["turno"].'</td>

                    <td class="text-uppercase">'.$value["Estatus"].'</td>

                    <td>


                    <div class="btn-group">

                    <button class="btn btn-warning btnEditarAsignacion" data-toggle="modal" data-target="#modalEditarAsignacion" idAsignacion="'.$value["Id"].'"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnEliminarAsignacion" idAsignacion="'.$value["Id"].'"><i class="fa fa-times"></i></button>

                  </div>
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
MODAL ASIGNACION DE GRUPO EDITAR GRUPO
======================================-->

<div id="modalEditarAsignacion" class="modal fade " role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Modificacion de datos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Datos del alumno
              </a>

            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <!-- ENTRADA PARA EL NOMBRE -->

                <div class="form-group row">

                   <div class="col-xs-4">
                         <label>Nombre</label>
                       <div class="input-group">

                         <span class="input-group-addon"><i class="fa fa-user"></i></span>

                         <input type="text" class="form-control input-sm" name="editarNombre" id="editarNombre">

                         <input type="hidden"  name="idAsignacion" id="idAsignacion" required>

                       </div>

                   </div>



                   <div class="col-xs-4">
                         <label>Apellido Paterno</label>
                       <div class="input-group">

                         <span class="input-group-addon"><i class="fa fa-user"></i></span>

                         <input type="text" class="form-control input-sm" name="editarAPaterno" id="editarAPaterno" >

                       </div>

                   </div>


                   <div class="col-xs-4">
                         <label>Apellido Materno</label>
                       <div class="input-group">

                         <span class="input-group-addon"><i class="fa fa-user"></i></span>

                         <input type="text" class="form-control input-sm" name="editarAMaterno" id="editarAMaterno">

                       </div>

                   </div>


                 </div>

                 <div class="col-xs-4">
                             <label> Asigna el Genero</label>
                                 <div class="input-group">

                                     <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                     <select class="form-control input-sm" name="editargenero" >

                                         <option value="" id="editargenero"></option>

                                         <option value="Hombre">Hombre</option>

                                         <option value="Mujer">Mujer</option>


                                     </select>

                                 </div>

                 </div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->

                 <div class="col-xs-4">
                       <label>Curp</label>
                     <div class="input-group">

                       <span class="input-group-addon"><i class="fa fa-user"></i></span>

                       <input type="text" class="form-control input-sm" name="editarCurp" id="editarCurp" >

                     </div>

                 </div>

                 <div class="form-group">
                             <label> Fecha de nacimiento</label>
                                 <div class="input-group">

                                     <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                     <input type="date" class="form-control input-sm" name="editarFecha_Nacimiento" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" id="editarFecha_Nacimiento" >

                                 </div>

                 </div>  <!-- FIN-->

                 <div class="form-group">
                             <label> Domicilio</label>
                                 <div class="input-group">

                                     <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                     <input type="text" class="form-control input-sm" name="editarDomicilio" id="editarDomicilio" >

                                 </div>

                 </div>  <!-- FIN-->



              </div>
            </div>






          </div>

          <div class="box-body">
          <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
              Asignacion escolar
            </a>

          </p>
          <div class="collapse" id="collapse2">
            <div class="card card-body2">
              <!-- Asignacion del Grado al alumnos-->


      <div class="form-group">
                  <label> Asigna el Nivel</label>
                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-users"></i></span>

                          <select class="form-control input-sm" name="editarNivel">

                              <option value="" id="editarNivel"></option>

                              <option value="KINDER">KINDER</option>

                              <option value="PRIMARIA">PRIMARIA</option>

                              <option value="SECUNDARIA">SECUNDARIA</option>



                          </select>

                      </div>

      </div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->


              <div class="form-group">
                          <label> Asigna el Grado</label>
                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                  <select class="form-control input-sm" name="editarGrado">

                                      <option value="" id="editarGrado"></option>

                                       <option value="1">PRIMERO</option>

                                      <option value="2">SEGUNDO</option>

                                      <option value="3">TERCERO</option>

                                      <option value="4">CUARTO</option>

                                      <option value="5">QUINTO</option>

                                      <option value="6">SEXTO</option>


                                  </select>

                              </div>

              </div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->

              <!-- Asignacion del Grupo al alumnos-->

              <div class="form-group">
                          <label> Asigna el Grupo</label>
                              <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                  <select class="form-control input-sm" name="editarGrupo">

                                      <option value="" id="editarGrupo"></option>

                                      <option value="A">A</option>

                                      <option value="B">B</option>

                                      <option value="C">C</option>

                                      <option value="D">D</option>

                                      <option value="K">K</option>

                                      <option value="AK">AK</option>

                                      <option value="BK">BK</option>

                                  </select>

                              </div>

              </div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->



            </div>
          </div>
</div>

<div class="box-body">
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
    Datos del padre
  </a>

</p>
<div class="collapse" id="collapse3">
  <div class="card card-body2">

    <div class="form-group">
                <label> Nombre</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarNombre_Padre" id="editarNombre_Padre" >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Edad</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarEdad_Padre" id="editarEdad_Padre" placeholder="" maxlength="2" minlength="1" value="" pattern="[0-9]+"  >

                    </div>

    </div>  <!-- FIN-->

    <div class="form-group">
                <label> Domicilio</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarDomicilio_Padre" id="editarDomicilio_Padre" >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Telefono</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarTelefono_Padre" id="editarTelefono_Padre" placeholder="" maxlength="10" minlength="1" value="" pattern="[0-9]+"  >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Profesion</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarProfesion_Padre" id="editarProfesion_Padre" >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Correo</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="email" class="form-control input-sm" name="editarCorreo_Padre" id="editarCorreo_Padre"  minlength="5" maxlength="100" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  >

                    </div>

    </div>  <!-- FIN-->

  </div>
</div>
</div>


<div class="box-body">
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
    Datos de la madre
  </a>

</p>
<div class="collapse" id="collapse4">
  <div class="card card-body2">

    <div class="form-group">
                <label> Nombre</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarNombre_Madre" id="editarNombre_Madre" >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Edad</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarEdad_Madre" id="editarEdad_Madre" placeholder="" maxlength="2" minlength="1" value="" pattern="[0-9]+"  >

                    </div>

    </div>  <!-- FIN-->

    <div class="form-group">
                <label> Domicilio</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarDomicilio_Madre" id="editarDomicilio_Madre" >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Telefono</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarTelefono_Madre" id="editarTelefono_Madre" placeholder="" maxlength="10" minlength="1" value="" pattern="[0-9]+"  >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Profesion</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="text" class="form-control input-sm" name="editarProfesion_Madre" id="editarProfesion_Madre" >

                    </div>

    </div>  <!-- FIN-->

    <div class="col-xs-4">
                <label> Correo</label>
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <input type="email" class="form-control input-sm" name="editarCorreo_Madre" id="editarCorreo_Madre"  minlength="5" maxlength="100" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  >

                    </div>

    </div>  <!-- FIN-->

  </div>
</div>
<div class="col-xs-4">
            <label> Asigna el Estatus</label>
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control input-sm" name="editarEstatus">

                        <option value="" id="editarEstatus"></option>

                        <option value="ACTIVO">ACTIVO</option>

                        <option value="INACTIVO">INACTIVO</option>


                    </select>

                </div>

</div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->

<div class="col-xs-4">
            <label> Asigna el Turno</label>
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control input-sm" name="editarturno" required>

                        <option value="" id="editarturno"></option>

                        <option value="VESPERTINO">VESPERTINO</option>

                        <option value="MATUTINO">MATUTINO</option>


                    </select>

                </div>

</div>  <!-- FIN DEL ESTADO DEL ASPIRANTE-->
</div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      <?php

          $editarAsignacion = new ControladorAsignacion();
          $editarAsignacion -> ctrEditarAsignacion();

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarAsignacion = new ControladorAsignacion();
  $borrarAsignacion -> ctrBorrarAsignacion();

?>
