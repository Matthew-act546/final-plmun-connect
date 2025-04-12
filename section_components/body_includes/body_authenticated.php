
<div class="container mt-3" style="min-height: 100vh;">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Welcome!</h1>
    <div id="datetimes" class="text-end"></div>
</div>

<p>Incoming Events</p>
  <iframe src="incomingEvents.php" 
        width="100%" 
        height="400" 
        style="border: 1px solid #ccc;"
        iframeborder="0">
        sd
    </iframe>
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

