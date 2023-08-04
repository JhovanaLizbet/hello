<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Estudiantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Estudiantes habilitados</h3>
                <br>

                <h1><?php echo $fechatest ?> </h1>
                <br>

                <h1>
                  <?php
                    //date_default_timezone_set('America/La_Paz');
                    echo date('Y/m/d H:i:s'); 
                  ?> 
                </h1>
                <br>

        <a href="<?php echo base_url(); ?>index.php/estudiante/agregar">
          <button type="button" class="btn btn-primary">Crear Estudiante</button>
        </a>

        <a href="<?php echo base_url(); ?>index.php/estudiante/deshabilitados">
          <button type="button" class="btn btn-warning">Ver Lista deshabilitados</button>
        </a>

        <a href="<?php echo base_url(); ?>index.php/estudiante/inscribir">
          <button type="button" class="btn btn-warning">INSCRIBIR</button>
        </a>


        <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
          <button type="button" class="btn btn-danger">Cerrar sesión</button>
        </a>

<br>
<h3>
  Login: <?php echo $this->session->userdata('login'); ?> <br>
  id: <?php echo $this->session->userdata('idusuario'); ?> <br>
  Tipo: <?php echo $this->session->userdata('tipo'); ?> <br>
</h3>

<hr>
<a href="<?php echo base_url(); ?>index.php/estudiante/proformapdf" target_blank>
  <button type="submit" class="btn btn-primary btn-block"> PROFORMA PDF</button>
</a>

<hr>
<a href="<?php echo base_url(); ?>index.php/estudiante/listapdf" target_blank>
  <button type="submit" class="btn btn-success btn-block"> Lista de estudiantes en PDF</button>
</a>



<hr>
<a href="<?php echo base_url(); ?>index.php/estudiante/listaxls" target_blank>
  <button type="submit" class="btn btn-warning btn-block"> Lista de estudiantes en EXCEL</button>
</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Creacion</th>
                    <th>Nota</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                    <th>Foto</th>
                  </tr>
                  </thead>
                  <tbody>
          <?php
            $indice=1;//el contador comienza en 1
            foreach($estudiantes->result() as $row)
            {
          ?>                                        
                  <tr>
                    <td><?php echo $indice; ?></td> <!--//el id es interno por tanto no se muestra por tanto manejamos contadores-->
                    <td><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido; ?></td>
                    <td><?php echo formatearFecha($row->creado); ?></td>
                    <td><?php echo $row->nota; ?></td>


                    <td>
      <?php 
        echo form_open_multipart('estudiante/modificar');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <button type="submit" class="btn btn-success">MODIFICAR</button>
      <?php
        echo form_close();
      ?>                  
                </td>
                
                <td>
      <?php 
        echo form_open_multipart('estudiante/eliminarbd');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <button type="submit" class="btn btn-danger">ELIMINAR</button>
      <?php
        echo form_close();
      ?>

                </td>

                <!--DESHABILITAR-->
                <td>
      <?php 
        echo form_open_multipart('estudiante/deshabilitarbd');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <button type="submit" class="btn btn-warning">DESHABILITAR</button>
      <?php
        echo form_close();
      ?>                      
                    </td>
                    
                    <td>
                      <?php
                        $foto=$row->foto;
                        if($foto=="")
                        {
                          ?>
                            <img width="100" src="<?php echo base_url(); ?>uploads/estudiantes/default.png">
                          <?php 
                        }
                        else
                        {
                          ?>
                            <a href="<?php echo base_url();?>uploads/estudiantes/pdficon.pdf" target="_blank" download> 
                            <img width="100" src="<?php echo base_url(); ?>uploads/estudiantes/pdficon.png" > 
                                                  
                          <?php
                        }
                      ?>

      <?php 
        echo form_open_multipart('estudiante/subirfoto');
      ?>
      <input type="hidden" name="idestudiante" value="<?php echo $row->idEstudiante; ?>">
      <button type="submit" class="btn btn-primary">Subir</button>
      <?php
        echo form_close();
      ?> 

                    </td>

                  </tr>
              <?php
              $indice++;

            }
          ?>                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Creacion</th>
                    <th>Nota</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                    <th>Foto</th>                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  