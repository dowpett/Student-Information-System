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
                            <h1 class="m-0">Student list</h1>
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
                        <div class="col-md-4">

                        </div>
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
                                                <th>Student ID</th>
                                                <th>Student Name</th>
                                                <th>Section</th>
                                                <th>Subject</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            require('config.php');

                                            $query = mysqli_query($conn, "SELECT * FROM student");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['studId'] . "</td>";
                                                echo "<td>" . $row['studName'] . "</td>";
                                                echo "<td>" . $row['yr_sec'] . "</td>";
                                                echo "<td>" . $row['subject'] . "</td>";
                                                echo "<td> 
                              
                               <a href= '#' class='btn btn-warning edit' data-id='" . $row['id'] . "'>Edit</a>
                              <a href= '#' onclick='deleteMe(" . $row['id'] . ")'  class='btn btn-danger'> <i class='fas fa-trash'></i>Delete</a>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insert New Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="list_action.php" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputstudentId">Student ID</label>
                                <input type="id" name="studId" class="form-control" id="InputstudentId" aria-describedby="emailHelp">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Student Name</label>
                                <input type="studentnm" name="studName" class="form-control" id="InputName">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputYr_Sec"> Year and Section</label>
                                <input type="studentys" name="yr_sec" class="form-control" id="InputYr_Sec">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSubject">Subject</label>
                                <input type="studentsubject" name="subject" class="form-control" id="InputSubject">
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
                    <form action="list_action.php" method="post">
                        <div class="modal-body">

                            <!--para sa di paulit ulit-->
                            <input type="text" name="id" id="id">

                            <div class="form-group">
                                <label for="exampleInputstudentId">Student ID</label>
                                <input type="id" name="studId" class="form-control" id="studId" aria-describedby="emailHelp">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Student Name</label>
                                <input type="studentnm" name="studName" class="form-control" id="studName">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputYr_Sec"> Year and Section</label>
                                <input type="studentys" name="yr_sec" class="form-control" id="yr_sec">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSubject">Subject</label>
                                <input type="studentsubject" name="subject" class="form-control" id="subject">
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

        <!--Modal for view-->

        <div class="modal" id="viewModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

</body>

<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            var id = $(this).data("id");
            $.ajax({
                //link ng backend
                url: "list_update.php",
                type: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    //flds names
                    $("#id").val(data.id);
                    $("#studId").val(data.studId);
                    $("#studName").val(data.studName);
                    $("#yr_sec").val(data.yr_sec);
                    $("#subject").val(data.subject);
                    $("#updatemodal").modal("show")

                }
            })
            //$("#updatemodal").modal("show")
        });
    });
</script>
<script>
    function deleteMe(data) {
        if (confirm("Are you sure you want to delete?") == true) {
            window.location.href = 'list_delete.php?id=' + data
        }
    }
</script>

</html>