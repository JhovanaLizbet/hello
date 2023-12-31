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
                <h3 class="card-title">Invitados</h3>
                <br>

        <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
          <button type="button" class="btn btn-danger">Cerrar sesión</button>
        </a>

<br>
<h3>
  Login: <?php echo $this->session->userdata('login'); ?> <br>
  id: <?php echo $this->session->userdata('idusuario'); ?> <br>
  Tipo: <?php echo $this->session->userdata('tipo'); ?> <br>
</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body">


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
  