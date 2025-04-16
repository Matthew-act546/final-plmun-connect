<?php 
    include './section_components/authenticated.php';
    if($authenticated == false) {
        header('location: dont-access.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

    <?php 
        include './section_components/header_includes/bootstrap.php';
    ?>
<body>

    <?php 
        include './section_components/header_includes/nav.php';
    ?>

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">My event</h1>
        <div id="datetimes" class="text-end"></div>
    </div>
    <p> Customize your events here!</p>
  <div class="card m-3 border border-success">
    <div class="card-header ">
      <b>Computer Science Society</b> <!-- shows the Host -->
    </div>
    <div class="card-body">
      <h4 class="card-title">Monthly Kamustahan</h4> 
      <p class="card-text"> <span class="lead fw-bold"> Description </span> <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus nemo excepturi unde fugiat? Eaque maxime sint qui doloremque mollitia iusto culpa asperiores ut soluta ullam? Illo reiciendis facere dicta et!
      </p>
      <p class="card-text">
      1:00PM - 5:00PM <br> 
      Computer Science Society <br> 
      CL1 

      </p>
      <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Edit 
      </button>

      <button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
      delete
      </button>
    </div>
  </div>

    <script>
        function updateDateTime() {
            var now = new Date();
            var date = now.toLocaleDateString();
            var time = now.toLocaleTimeString();
            document.getElementById("datetimes").innerHTML = date + "<br>" + time;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>

</body>
</html>
