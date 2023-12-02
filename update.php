<?php
$servername="localhost";
$username="root";
$password="";
$database="employee";

$connection = new mysqli($servername, $username, $password, $database);

$id="";
$emid="";
$fname="";
$lname="";
$position="";

$errorMessage= "";
$successMessage= "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET'){

    if (!isset($_GET["id"])){
        header("location: /crud/index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM kso WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: /crud/index.php");
        exit;
    }

    $emid= $row["employee_id"];
    $fname= $row["firstname"];
    $lname= $row["lastname"];
    $position= $row["position"];
}
else{

    $id= $_POST["id"];
    $emid= $_POST["emid"];
    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $position= $_POST["position"];

    do{
        if ( empty($id) || empty($emid) || empty($fname) || empty($lname) || empty($position)){
            $errorMessage = "All the fields are required";
            break;
        }
    
        $sql = "UPDATE kso
            SET employee_id='$emid', firstname='$fname', lastname='$lname', position='$position'".
            "WHERE id=$id";

        $result = $connection->query($sql);
        if (!$result){
            $errorMessage = "Invalid query:" . $connection->error;
            break;
        }

        $successMessage = "Employee updated successfuly! ";

    } while(false);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
    <title>KSO Company</title>
</head>
<body class="bg-success">
    <div class="container p-5 my-5 bg-white">
        <h2>Update Employee</h2>
        
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Employee ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="emid" value="<?php echo $emid; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Position</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="position" value="<?php echo $position; ?>">
                </div>
            </div>

            <?php
            if ( !empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissable fade show' role='alert'>
                            <strong> $successMessage </strong>
                        </div>
                    </div>     
                </div>
                 ";
            }
            
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/crud/index.php" role="button"> Cancel </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>