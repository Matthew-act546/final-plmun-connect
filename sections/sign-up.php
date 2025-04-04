<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset your Password</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../custom.css">
  <script src="assets/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-primary">
        <div class="container-fluid d-flex justify-content-center">
          <a class="navbar-brand text-white" href="../index.php"><img src="../assets/images/Logo.png" style="height: 50px;"> PLMun Connect</a>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center" id="sign-up" style='min-height: 100vh;'>
    <div class="card p-2" style="width: 50%;">
      <form class="form-control-sm">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address (Institutional Email)</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address" required>
        </div>
  
        <div class="input mb-3">
          <label for="exampleInputEmail1" class="form-label">Student ID</label>
          <input type="number" min="0" max="99999999" oninput="if(this.value.length > 8) this.value = this.value.slice(0, 8)" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter your Student ID" required>
  </div>
  
        <div class="mb-3">
          <p>Select your Program</p>
          <select class="form-select" aria-label="Default select example" aria-placeholder="Select your Program--" required>
            <option selected>Lists of Programs</option>
            <option value="MBA">Master in Business Administration</option>
            <option value="MAE-EM">Master of Arts in Education, major in Educational Management</option>
            <option value="MAE-GC">Master of Arts in Education, major in Guidance and Counseling</option>
            <option value="MSCA">Master in Security and Correctional Administration</option>
            <option value="MIT">Master in Information Technology</option>
            <option value="MSCrim">Master of Science in Criminology</option>
            <option value="BACom">Bachelor of Arts in Communication</option>
            <option value="BSPsychology">Bachelor of Science in Psychology</option>
            <option value="BSBA-HR">BSBA Major in Human Resource Development Management</option>
            <option value="BSBA-MM">BSBA Major in Marketing Management</option>
            <option value="BSBA-OM">BSBA Major in Operations Management</option>
            <option value="BSA">Bachelor of Science in Accountancy</option>
            <option value="BSC">Bachelor of Science in Criminology</option>
            <option value="BSCS">Bachelor of Science in Computer Science</option>
            <option value="BSIT">Bachelor of Science in Information Technology</option>
            <option value="ACT">Associate in Computer Technology</option>
            <option value="DM">Doctor of Medicine</option>
            <option value="BEED-GEE">BEED General Elementary Education</option>
            <option value="BEED-MS">BSED Major in Science</option>
            <option value="BEED-ME">BSED Major in English</option>
            <option value="BEED-MSS">BSED Major in Social Science</option>
            <option value="BPA">Bachelor of Public Administration</option>
            <option value="BAPS">Bachelor of Arts in Political Science</option>
            <option value="BSSW">Bachelor of Science in Social Work</option>

          </select>
         
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" maxlength="50" minlength="8" id="exampleInputPassword1" placeholder="Enter your desired password" required>
        </div>
  
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" maxlength="50" minlength="8" id="exampleInputPassword1" placeholder="Re-enter your password" required>
        </div>
  
        <label class="form-label" for="inputGroupFile02">Upload your COR</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02" required>
  
        </div>
        <div style="text-align: center;">
        <button type="submit" class="btn btn-success" >Submit</button>
        </div>
        <div class="text-center mt-3">
          I already have an account <a href="login.php" class="text-primary">Back to Login</a>
      </div>
  
      </form>
    </div>
  </body>
</html>