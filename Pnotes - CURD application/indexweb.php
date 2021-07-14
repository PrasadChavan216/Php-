<?php
//Connect to db
$servername = "localhost";
$username = "thedigim_prasadchavan";
$password = "Prasad@216";
$dbname = "thedigim_prasad";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Sorry because -->" . mysqli_connect_error($conn));
}

$insert = false;
$update = false;
$delete = false;

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];

  $sql = " DELETE FROM `notes` WHERE `notes`.`srno` = '$sno' ";
  $result = mysqli_query($conn, $sql);

  $delete = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['srnoEdit'])) {
    // Update the record
    $srno = $_POST['srnoEdit'];
    $title = $_POST['titleEdit'];
    $desc = $_POST['descpEdit'];

    $sql = " UPDATE `notes` SET `title` = '$title', `descp` = '$desc' WHERE `notes`.`srno` = '$srno' ";
    $result = mysqli_query($conn, $sql);

    if (!$result) echo "Failed to update Note";
    else $update = true;
  } else {
    $title = $_POST['title'];
    $desc = $_POST['descp'];

    $sql = " INSERT INTO `notes` (`title`, `descp`) VALUES ('$title', '$desc')";
    $result = mysqli_query($conn, $sql);


    if (!$result) echo "Failed";
    else $insert = true;
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <title>PNotes - All your Notes at one Place..!!</title>

  <style>
    .container {
      width: 80%;
    }
  </style>

</head>

<body>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="index.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="srnoEdit" id="srnoEdit">
            <div class="mb-3">
              <label for="title" class="form-label">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="descp" class="form-label">Note Description</label>
              <textarea class="form-control" id="descpEdit" name="descpEdit" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">"PNotes" - All your notes at one place.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </div>
    </div>
  </nav>

  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your note has been submitted successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }

  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your note has been updated successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }

  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your note has been Deleted successfully.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  ?>


  <div class="container my-4">
    <form action="index.php" method="POST">
      <h2>Add Notes</h2>
      <div class="mb-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="descp" class="form-label">Note Description</label>
        <textarea class="form-control" id="descp" name="descp" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>

  <div class="container my-4">
    <?php

    $sql = "SELECT * FROM `notes`";

    $result = mysqli_query($conn, $sql);
    ?>

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.no</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action's</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($rows = mysqli_fetch_assoc($result)) {

          echo "<tr>
                  <th scope='row'>" . $no . "</th>
                  <td>" . $rows['title'] . "</td>
                  <td>" . $rows['descp'] . "</td>
                  <td><button class='edit btn btn-sm btn-primary' id=" . $rows['srno'] . ">Edit</button>  
                  <button class='delete btn btn-sm btn-primary' id=d" . $rows['srno'] . ">Delete</button></td>
                  </tr>";
          $no++;
        }
        ?>

      </tbody>
    </table>
  </div>

  <hr>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ", );
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        descp = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, descp);
        titleEdit.value = title;
        descpEdit.value = descp;
        srnoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ", );
        sno = e.target.id.substr(1, );

        if (confirm("Are you sure you want to delete this note..!")) {
          console.log("yes");
          window.location = `index.php?delete=${sno}`;

          // TODO : Make a form and send data through POST method.
        } else {
          console.log("no");
        }

      })
    })
  </script>
</body>
</html>