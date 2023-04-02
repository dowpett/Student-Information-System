
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
            <h1 class="m-0">Schedule List</h1>
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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> New</button>

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
                      
                      <th>Schedule</th>
                      <th>Subject</th>
                      <th>Section</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                    require('config.php');

                    $query = mysqli_query($conn, "SELECT * FROM schedule");
                    while ($row = mysqli_fetch_array($query)){
                      echo "<tr>";
                      echo "<td>".$row['schedule']."</td>";
                      echo "<td>".$row['subject_id']."</td>";
                      echo "<td>".$row['section']."</td>";
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

<!-- Modal for NEW -->
<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert New Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="schedule_action.php" method="post">
      <div class="modal-body">

  <div class="form-group">
    <label for="exampleInputSchedule">Schedule</label>
    <input type="schedule"  name="schedule"class="form-control" id="Inputschedule" aria-describedby="schedHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputName">Subject</label>
    <input type="subject" name="subject_id"class="form-control" id="InputSub">
  </div>
  <div class="form-group">
    <label for="exampleInputName">Section</label>
    <input type="section" name="section"class="form-control" id="InputSection">
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
      <form action="schedule_action.php" method="post">
      <div class="modal-body">

      <!--para sa di paulit ulit-->
      <input type ="text" name ="id" id ="id">

  <div class="form-group">
    <label for="exampleInputschedule">Schedule</label>
    <input type="sched"  name="schedule"class="form-control" id="schedule" aria-describedby="schedHelp">
   
  </div>
  <div class="form-group">
    <label for="exampleInputdescription">Section</label>
    <input type="section" name="section"class="form-control" id="section">
  </div>

  
  <div class="form-group">
    <label for="exampleInputSubject">Subject</label>
    <input type="subject" name="subject_id"class="form-control" id="subject_id">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Save</button>
      </div>
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
        url:"schedule_update.php",
        type:"POST",
        data: {
          id: id
        },
        dataType: "JSON",
        success:function(data){
          //flds names
          $("#id").val(data.id);
          $("#schedule").val(data.schedule);
          $("#section").val(data.section);
          $("#subject_id").val(data.subject_id);
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
      window.location.href='schedule_delete.php?id='+data
    }
  }
</script>
</html>
