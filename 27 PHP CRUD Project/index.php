<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    echo "<h1>Could Not Connect to Database! Please try some time after. We regret the inconvinience!</h1>";
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <title>CRUD Project</title>
</head>

<body>



    <!-- MODAL FOR EDITING NOTES-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="titleEdit" class="form-label">Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" placeholder="Enter Title" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="descriptionEdit">Description</label>
                            <textarea class="form-control" name="descriptionEdit" placeholder="Enter Description" id="descriptionEdit"></textarea>
                        </div>

                        <!-- <button type="submit" class="btn btn-primary">Add Notes</button> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL FOR DELETING NOTES -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="snoDelete" id="snoDelete">
                        Are You Sure You Want To Delete This Note?
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes, Delete Note</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">CRUD Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- UTILITY SVG ICONS -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>



    <!-- INSERTING OR UPDATING DATA IN DATABASE ON POST -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['snoDelete'])) {
            $sno = $_POST['snoDelete'];
            $sql="DELETE FROM notes WHERE sno = '$sno'";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                // SUCCESS MESSAGE
                echo "<div class='alert alert-success alert-dismissible d-flex align-items-center' role='alert'>
                 <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                 <div>
                   Note Deleted Successfully!
                 </div>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";
            } else {
                // FAILURE MESSAGE
                echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Unable to delete the note. Please try after some time!" . mysqli_error($connection) . "
            </div>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }
        } else if (isset($_POST['snoEdit'])) {
            // UPDATE RECORD
            $title = $_POST['titleEdit'];
            $description = $_POST['descriptionEdit'];
            $sno = $_POST['snoEdit'];
            $sql = "UPDATE notes SET description = '$description', title='$title' WHERE sno = '$sno'";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                // SUCCESS MESSAGE
                echo "<div class='alert alert-success alert-dismissible d-flex align-items-center' role='alert'>
                 <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                 <div>
                   Data Updated Successfully!
                 </div>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";
            } else {
                // FAILURE MESSAGE
                echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Unable to connect to database. Please try after some time!" . mysqli_error($connection) . "
            </div>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }
        } else {
            // INSERT RECORD

            $title = $_POST['title'];
            $description = $_POST['description'];

            $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title','$description')";
            $result = mysqli_query($connection, $sql);


            if ($result) {
                // SUCCESS MESSAGE
                echo "<div class='alert alert-success alert-dismissible d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
            <div>
              Data Inserted Successfully!
            </div>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            } else {
                // FAILURE MESSAGE
                echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Unable to connect to database. Please try after some time!
            </div>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }
        }
    }
    ?>


    <!-- FORM -->
    <div class="container my-5">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" placeholder="Enter Description" required id="description"></textarea>
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Add Notes</button>
        </form>
    </div>


    <!-- DISPLAYING THE DATA -->
    <div class="container my-5">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SNo.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <!-- READING THE DATA FROM THE DATABASE -->
                <?php
                $sql = "SELECT * FROM notes";
                $result = mysqli_query($connection, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo " <tr>
                        <th scope='row'>" . $sno . "</th>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td><!-- Edit Button trigger modal -->
                        <button type='button' class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#exampleModal' id=" . $row['sno'] . ">
                                Edit
                            </button>
                            <!-- Delete Button trigger modal -->
                        <button type='button' class='btn btn-primary delete' data-bs-toggle='modal' data-bs-target='#deleteModal' id=" . $row['sno'] . ">
                                Delete Note
                            </button></td>
                            </td>
                    </tr>";
                }
                ?>


            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->

    <!-- USING DATA TABLES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        console.log("Hello");
        var edits = document.getElementsByClassName('edit');
        console.log(edits);
        Array.from(edits).forEach(element => {
            element.addEventListener('click', (e) => {
                // e refers to the event
                // e.target gives us the target element
                targetRow = e.target.parentNode.parentNode;
                var title = targetRow.getElementsByTagName('td')[0].innerText;
                var description = targetRow.getElementsByTagName('td')[1].innerText;
                // console.log(title);
                // console.log(description);

                document.getElementById("titleEdit").value = title;
                document.getElementById("descriptionEdit").value = description;

                var sno = e.target.id;
                // console.log(sno);

                document.getElementById("snoEdit").value = sno;

            })
        });

        var deletes = document.getElementsByClassName('delete');
        // console.log(deletes);
        Array.from(deletes).forEach(element => {
            element.addEventListener('click', (e) => {
                // targetRow=e.target.parentNode.parentNode;
                var sno = e.target.id;
                // console.log(sno);

                document.getElementById('snoDelete').value = sno;
            });
        });
    </script>

</body>

</html>