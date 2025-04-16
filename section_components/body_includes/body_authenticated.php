<?php
  $first_name = $_SESSION['first_name'];
?>


<div class="container mt-3" style="min-height: 100vh;">
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Welcome <?= $first_name ?></h1>
    <div id="datetimes" class="text-end"></div>
  </div>

  <p>These are the Incoming Events at PLMun!</p>

  <div class="card m-3 border border-success">
    <div class="card-header ">
      <b>Computer Science Society</b>
    </div>
    <div class="card-body">
      <h5 class="card-title">Monthly Kamustahan</h5>
      <p class="card-text">
        1:00PM - 5:00PM <br>
        Computer Science Society <br>
        CL1

      </p>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        View more 
      </button>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-body">
              <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="container">
              
                <h1> Event title</h1>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis adipisci distinctio pariatur libero commodi ea 
                    vel minus fugiat asperiores, excepturi, officia unde voluptatum reiciendis eligendi ex, quaerat atque. Maiores
                    officia nesciunt sed architecto ex hic, itaque ab, ea, voluptas reprehenderit aperiam quidem! Itaque illo, 
                    voluptates veritatis nisi blanditiis consectetur voluptatum voluptate quidem vitae iusto corporis consequuntur,
                    facilis totam. Dolores quasi quod soluta ipsum! Sint tenetur nobis minus numquam placeat enim!
                  </p>
                  <p style="font-weight: bolder;">
                    Tuesday, April 1 <br>
                    8:00PM - 10:00PM <br>
                    Venue CL1
                  </p>
                  <h3 style="font-weight: 650;">Host</h3>
                  <p>Matthew David C. Fernandez</p>

                  <button class="btn btn-success mb-3">Count me in!</button>
                </div>
              
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
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

