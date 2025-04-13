<?php 
    include './section_components/authenticated.php';
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
<div class="container d-flex justify-content-center align-items-center mt-5 min-vh-50">
    <div class="w-50 shadow p-4 rounded bg-light">

    <h3 class="text-center mb-4">Organization Form</h3>

    <form>
        <!-- Organization Name -->
        <div class="mb-3">
            <label for="orgName" class="form-label">Organization Name</label>
            <select class="form-select" id="organization" name="organization" required>
                <option value="" disabled selected>Select an organization</option>
                <option value="CAS">CAS</option>
                <option value="CBA">CBA</option>
                <option value="CCJ">CCJ</option>
                <option value="CITCS">CITCS</option>
                <option value="COA">COA</option>
                <option value="CTE">CTE</option>
                <option value="IPPG">IPPG</option>
                <option value="CS Society">CS Society</option>
                <option value="IT Society">IT Society</option>
                <option value="ACT Society">ACT Society</option>
            </select>
        </div>

        <!-- Position -->
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select class="form-select" id="position" name="position" required>
                <option value="" disabled selected>Select a position</option>
                <option value="President">President</option>
                <option value="Vice President">Vice President</option>
                <option value="Secretary">Secretary</option>
                <option value="Treasurer">Treasurer</option>
                <option value="Auditor">Auditor</option>
                <option value="PRO 1">Public Relations Officer</option>
                <option value="PRO 2">Public Relations Officer</option> 
                <option value="Business Manager 1">Business Manager 1</option>
                <option value="Business Manager 2">Business Manager 2</option>
                <option value="Sergeant at Arms 1">Sergeant at Arms 1</option>
                <option value="Sergeant at Arms 2">Sergeant at Arms 2</option>
                <option value="1st Representative">1st Representative</option>
                <option value="2nd Representative">2nd Representative</option>
                <option value="3rd Representative">3rd Representative</option>
                <option value="4th Representative">4th Representative</option>
                <option value="4th Representative">Volunteer/Junior Officer</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Request</button>
        </div>
      </form>

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

    <?php 
        include './section_components/footer.php';
    ?>
</body>
</html>
