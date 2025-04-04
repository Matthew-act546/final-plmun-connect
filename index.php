<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLMun Connect</title>
  <link rel="icon" type="image/png" href="./assets/images/Logo.png">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="custom.css">
  <script src="assets/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-primary">
    <div class="container-fluid d-flex align-items-center justify-content-between ms-3">
      <a class="navbar-brand text-white" href="#home">
        <img src="./assets/images/Logo.png" style="height: 50px;">PLMun Connect</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse me-5" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active text-white" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#about-section">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#features-section">Features</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
      <button type="button"  class="btn btn-outline-warning ms-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 130px;">Register Now!</button>
      </div>
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title fs-5" id="staticBackdropLabel">Sign up</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container d-flex align-items-center justify-content-center" id="sign-up" style='min-height: 100vh;'>

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
                    I already have an account <a href="./sections/login.html" class="text-primary">Back to Login</a>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>


  <div id="home" class="container text-center">
    <div class="row">
      <div class="col-6 col-12 col-md-6 d-flex align-items-center" style="min-height: 60vh;">
        <div style="text-align: left;">
            <h2>Connecting PLMun students✨</h2>
            <p class="text-justify">Seamlessly organize and elevate your events at Pamantasan ng Lungsod ng Muntinlupa! Our event management platform
            ensures a smooth and hassle-free experience for student organizations, faculty, and school departments. From planning to
            execution, we provide the tools you need to create memorable and well-coordinated events. Let’s bring your ideas to
            life one successful event at a time!</p>
            <div>
            <button type="button" class="btn btn-outline-success txt-bypass" style="width: 80px;"><a href="./sections/sign-up.html"
                class="txt-bypass" style="text-decoration: none;">Sign up</a></button> <!-- !22 -->
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>

              <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="loginModalLabel">Login</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" . . . @plmun.edu.ph">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" maxlength="50" minlength="8" id="exampleInputPassword1" placeholder="Enter your password">
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                          <label class="form-check-label" for="flexCheckIndeterminate">
                            Remember me
                          </label>
                        </div>
                        <div style="text-align: center;">
                          <p><a href="./sections/forgot-password.html" class="text-primary">Forgot Password?</a></p>
                        </div>
                        <div style="text-align: center;">
                          <button type="submit" class="btn btn-success">Log In</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-6 col-12 col-md-6 d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="d-inline-block ">
          <img src="./assets/images/PLMunBuilding.jpeg" class="card-img-top img-fluid"
            style="width: 380px; height: 405px; border: 1px solid transparent; border-radius: 15%; box-shadow: 10px 10px 20px rgba(0, 128, 0, 0.6);"
            alt="a photo of PLMun Building"> <!-- !11 -->
        </div>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#006B3C" fill-opacity="1"
      d="M0,32L80,37.3C160,43,320,53,480,80C640,107,800,149,960,170.7C1120,192,1280,192,1360,192L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
    <path fill="#fdcc0d" fill-opacity="1"
      d="M0,224L80,229.3C160,235,320,245,480,208C640,171,800,85,960,85.3C1120,85,1280,171,1360,213.3L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#006B3C" fill-opacity="1"
      d="M0,64L80,101.3C160,139,320,213,480,234.7C640,256,800,224,960,186.7C1120,149,1280,107,1360,85.3L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
    </path>
    <path fill="#FDCC0D" fill-opacity="1"
      d="M0,64L80,58.7C160,53,320,43,480,80C640,117,800,203,960,245.3C1120,288,1280,288,1360,288L1440,288L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
    </path>
  </svg>


  <div id="about-section" class="about" style="min-height: 100vh;">
    <h1 class="text-center mb-4">About us</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          
            <div id="wer" class="card d-inline-block">
              <div class="card-body my-3">
                <img src="./assets/images/about1.png" class="card-img-top img-fluid" alt="our picture together with our proffessor Mrs. Umali">
                <p class="card-text">
                  We are <b>Matthew, Lawrence, James, and Illannah,</b> students from <b>BSCS-1B</b> at Pamantasan ng Lungsod ng
                  Muntinlupa (PLMun).
                  This website is part of our Web Technology subject, under the guidance of our professor, <b>Mrs. Umali.</b>
                  <br> <br>
                  Our goal is to create a comprehensive event management platform tailored for student organizations and societies
                  at
                  PLMun. This platform will streamline event planning, coordination, and execution, making it easier for
                  organizations to
                  manage their activities efficiently. Whether it's a seminar, a workshop, a competition, or a major school event –
                  our
                  website is designed to help organizers stay organized and attendees stay informed.
                  <br> <br>
                  Through this project, we aim to apply our web development skills, enhance collaboration within student
                  communities, and
                  contribute to a more dynamic and well-managed event culture at PLMun.
                </p>
              </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="row g-4">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card mx-auto my-3" >
                <div class="d-flex justify-content-center">
                  <img src="./assets/images/matthew.jpg" class="mt-3" style="height: 150px; width: 150px;" alt="matthew image">
                </div>
                <div class="card-body">
                  <p class="card-text text-center">Matthew David C. Fernandez <br> Full-stack Web Developer</p>
                  <div class="d-flex justify-content-center">
                    <a href="https://www.facebook.com/Matthew.act546" style="text-decoration: none;">
                      <img src="assets/images/fb-logo.png" class="ms-1 tex" style="width: 30px; height: 30px;" alt="Logo">
                    </a>
                    <a href="https://github.com/faaarbeyond" style="text-decoration: none;">
                      <img src="assets/images/github.png" class="ms-1" style="width: 28px; height: 28px;" alt="Logo">
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=matthewyt765@gmail.com" style="text-decoration: none;">
                      <img src="assets/images/email.jpeg" class="ms-1" style="width: 35px; height: 30px;" alt="Logo">
                    </a>
                  </div>
                </div>
              </div>
            </div>
        
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card mx-auto my-3">
                <div class="d-flex justify-content-center">
                  <img src="./assets/images/Lawrence.jpg" class="mt-3" style="height: 150px; width: 150px;"
                    alt="Lawrence image">
                </div>
                <div class="card-body">
                  <p class="card-text text-center">Lawrence John S. Alibangbang <br> Front-end Developer</p>
                  <div class="d-flex justify-content-center">
                  <a href="https://www.facebook.com/Laaawrence" style="text-decoration: none;">
                    <img src="assets/images/fb-logo.png" class="ms-1" style="width: 30px; height: 30px;" alt="Logo">
                  </a>
                  <a href="https://github.com/faaarbeyond" style="text-decoration: none;">
                    <img src="assets/images/github.png" class="ms-1" style="width: 28px; height: 28px;" alt="Logo">
                  </a>
                  <a href="https://mail.google.com/mail/?view=cm&fs=1&to=matthewyt765@gmail.com" style="text-decoration: none;">
                    <img src="assets/images/email.jpeg" class="ms-1" style="width: 35px; height: 30px;" alt="Logo">
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        
          <div class="row g-4">
            <div class="col-12">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="card mx-auto my-3">
                    <div class="d-flex justify-content-center">
                      <img src="./assets/images/duquilar.jpg" class="mt-3" style="height: 150px; width: 150px;"
                        alt="James image">
                    </div>
                    <div class="card-body">
                      <p class="card-text text-center">James Lawrenz Duquilar<br> Back-end Developer</p>
                      <div class="d-flex justify-content-center">
                      <a href="https://www.facebook.com/james.duquilar" style="text-decoration: none;">
                        <img src="assets/images/fb-logo.png" class="ms-1" style="width: 30px; height: 30px;" alt="Logo">
                      </a>
                      <a href="https://github.com/Yuri-Guro" style="text-decoration: none;">
                        <img src="assets/images/github.png" class="ms-1" style="width: 28px; height: 28px;" alt="Logo">
                      </a>
                      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=jamesduquilar0128@gmail.com" style="text-decoration: none;">
                        <img src="assets/images/email.jpeg" class="ms-1" style="width: 35px; height: 30px;" alt="Logo">
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="card mx-auto my-3" style="margin-top: 20px; ">
                    <div class="d-flex justify-content-center">
                      <img src="./assets/images/illanah.jpg" class="mt-3" style="height: 150px; width: 150px;"
                        alt="Illanah image">
                    </div>
                    <div class="card-body">
                      <p class="card-text text-center">Illannah Rayne Cervantes<br> UI & UX Designer</p>
                      <div class="d-flex justify-content-center">
                      <a href="https://www.facebook.com/illannah.mendoza.cervantes" style="text-decoration: none;">
                        <img src="assets/images/fb-logo.png" class="ms-1" style="width: 30px; height: 30px;" alt="Logo">
                      </a>
                      <a href="https://github.com/Cillannah" style="text-decoration: none;">
                        <img src="assets/images/github.png" class="ms-1" style="width: 28px; height: 28px;" alt="Logo">
                      </a>
                      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Illannahc@gmail.com" style="text-decoration: none;">
                        <img src="assets/images/email.jpeg" class="ms-1" style="width: 35px; height: 30px;" alt="Logo">
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#fdcc0d"fill-opacity="1"
      d="M0,32L80,37.3C160,43,320,53,480,80C640,107,800,149,960,170.7C1120,192,1280,192,1360,192L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
    <path fill="#006B3C" fill-opacity="1"
      d="M0,224L80,229.3C160,235,320,245,480,208C640,171,800,85,960,85.3C1120,85,1280,171,1360,213.3L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#FDCC0D" fill-opacity="1"
      d="M0,64L80,101.3C160,139,320,213,480,234.7C640,256,800,224,960,186.7C1120,149,1280,107,1360,85.3L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
    </path>
    <path fill="#006B3C" fill-opacity="1"
      d="M0,64L80,58.7C160,53,320,43,480,80C640,117,800,203,960,245.3C1120,288,1280,288,1360,288L1440,288L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
    </path>
  </svg>

  <div id="features-section" style="min-height: 100vh; text-align: center;">
    <h1>Features</h1>
    <div class="container mt-4">
      <div class="row">
          <div class="col-md-6 my-3">
              <div class="card">
                  <div class="card-body">
                    <img src="./assets/images/host.png" class="card-img-top img-fluid" style="height: 100px; width: 80px;" alt="a photo of calendar">
                      <h5 class="card-title">Host</h5>
                      <p class="card-text">Perks</p>
                        <ul class="text-start">
                          <li>Add co-hosts and managers to events</li>
                          <li>Manage event registration</li>
                          <li>Check-in guests using ticket scanning</li>
                          <li>Collect feedback from attendees after the event</li>
                          <li>Promote events on explore pages for increased visibility</li>
                          <li>Access insights on event discovery and registration</li>
                          <li>Customize event pages with images and videos</li>
                          <li>Utilize advanced integrations for event planning tasks</li>
                        </ul>
                      </p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 my-3">
              <div class="card">
                  <div class="card-body">
                    <img src="./assets/images/attendees.png" class="card-img-top img-fluid" style="height: 100px; width: 80px;" alt="a photo of attendees">
                      <h5 class="card-title">Attendees</h5>
                      <p class="card-text">Perks</p>
                      <ul class="text-start">
                        <li>Easy event registration</li>
                        <li>Access to event details (schedules, speakers, locations)</li>
                        <li>Feedback opportunities after events</li>
                        <li>Discover popular events in PLMun</li>
                        <li>Social sharing of experiences and feedback</li>
                        <li>Exclusive access to certain event perks</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <button id="backToTop" class="back-to-top">↑ back to top?</button>

  <hr style="border: 3px solid black; width: 70%; margin: 0 auto; color: black;">
  <footer style="min-height: 15vh;">
    <p class="text-center">
      &copy; Copyrights 2025 MLJI
    </p>
  </footer>

  <script src="script.js"></script>
</body>
</html>