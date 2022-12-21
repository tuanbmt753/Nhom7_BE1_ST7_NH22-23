<?php
  include("header.php");
  include("sidebar.php");
  if(isset($_GET['id'])){
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="user-edit2.php" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">       

            <?php
              $data = $user->getUserByUserId($_GET['id']);
            ?>
              <!-- User Id -->
              <div class="form-group">
                <label for="user_name">User ID</label>
                <br><?php echo $data[0]['user_id'];?>
                <input value="<?php echo $data[0]['user_id'];?>" name="user_id" type="hidden" id="user_name" class="form-control">
              </div>

              <!-- User name -->
              <div class="form-group">
                <label for="user_name">User Name</label>
                <input value="<?php echo $data[0]['username'];?>" name="user_name" type="text" id="user_name" class="form-control">
              </div>

              <!-- Password -->
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="text" id="password" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputStatus">Rold Id  </label>
                <select name="rold_id" id="inputStatus" class="form-control custom-select">
                <?php if($data[0]['role_id'] == 2){?>           
                    <option selected value ="2">2</option>
                    <option  value= "1">1</option>
                <?php } else {?>
                    <option selected value ="1">1</option>
                    <option  value= "2">2</option>
                <?php }?>
                </select>
              </div>
             

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input  type="submit" value="Update Protypes" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
  }
    include("footer.php");
?>