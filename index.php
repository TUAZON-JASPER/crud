<?php

require_once('config/db.php');
$query = "select * from kso";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>KSO Company</title>
</head>
<body class="bg-success">
    <h1 class="display-5 m-5 text-center text-white"> Kangkong Soap Original Company</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card"> 
                    <div class="card-header position-relative">
                        <h2 class="display-6"> KSO Employees</h2>
                        <a class="btn btn-success float-end" href="/crud/create.php" role="button"> Add Employee </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="table-dark text-white">
                                <td>ID</td>
                                <td>Employee ID</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Position</td>
                                <td>Action</td>
                                <!-- <td>
                                    <a class="btn btn-outline-primary-sm" href="/crud/update.php">Update</a>
                                    <a class="btn btn-outline-danger-sm" href="/crud/delete.php">Delete</a>
                                </td> -->
                            </tr>
                            <tr>
                            <?php

                            while($row = mysqli_fetch_assoc($result))
                            {
                            ?>                            
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['employee_id'];?></td>
                                <td><?php echo $row['firstname'];?></td>
                                <td><?php echo $row['lastname'];?></td>
                                <td><?php echo $row['position'];?></td>
                                <td>
                                    <a href="/crud/update.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">Update</a>
                                    <a href="/crud/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Delete</a>
                               </td>
                            </tr>
                            <?php
                            }

                            ?>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>