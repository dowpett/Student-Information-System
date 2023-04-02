
<?php include('layout/header.php'); ?>
<body class="dark-mode sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->

  <?php include('layout/nav.php'); ?>
<!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('layout/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subject list</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <!-- /.container-fluid -->
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <tr>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> New</button>
              </tr>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    require('config.php');

                    $query = mysqli_query($conn, "SELECT * FROM subject");
                    while ($row = mysqli_fetch_array($query)){
                      echo "<tr>";
                      echo "<td>".$row['subject_code']."</td>";
                      echo "<td>".$row['description']."</td>";
                      echo "<td> 
                               <a href= '#' class='btn btn-warning edit' data-id='".$row['id']."'>Edit</a>
                              <a href= '#' onclick='deleteMe(".$row['id'].")'  class='btn btn-danger'> <i class='fas fa-trash'></i>Delete</a>
                            </td>";
                      echo "</tr>";
                  }
              
                  
                  
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include('layout/footer.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php include('layout/script.php'); ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal  for new-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert New Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="subject_action.php" method="post">
      <div class="modal-body">

  <div class="form-group">
    <label for="exampleInputstudentId">Subject</label>
    <input type="id"  name="subject_code"class="form-control" id="InputSubjectcode" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="description" name="description"class="form-control" id="InputDesc">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal  for update-->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="subject_action.php" method="post">
      <div class="modal-body">

      <!--para sa di paulit ulit-->
      <input type ="text" name ="id" id ="id">

  <div class="form-group">
    <label for="exampleInputsubject_code">Subject</label>
    <input type="id"  name="subject_code"class="form-control" id="subject_code" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="exampleInputdescription">Description</label>
    <input type="description" name="description"class="form-control" id="description">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
</body>

<script>
  $(document).ready(function(){
    $(".edit"). click(function(){
      var id =$(this).data("id");
      $.ajax({
        //link ng backend
        url:"subject_update.php",
        type:"POST",
        data: {
          id: id
        },
        dataType: "JSON",
        success:function(data){
          //flds names
          $("#id").val(data.id);
          $("#subject_code").val(data.subject_code);
          $("#description").val(data.description);
          $("#updatemodal").modal("show")
        
      }
      })
      //$("#updatemodal").modal("show")
    });
  });
</script>
<script>
  function deleteMe(data){
    if(confirm("Are you sure you want to delete?")==true){
      window.location.href='subject_delete.php?id='+data
    }
  }
</script>
</html>
