<?php
include 'connect.php';

// Fetch driver details
$driver_query = "SELECT * FROM Drivers";
$driver_result = $conn->query($driver_query);

$drivers = [];
if ($driver_result->num_rows > 0) {
    while ($row = $driver_result->fetch_assoc()) {
        $drivers[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula 1 Drivers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style3.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between fixed-top custom-bg">
        <a class="navbar-brand" href="index.php">
            <img src="images/Asset 1.png" width="150" height="auto" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="drivers.php">Drivers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teams.php">Teams</a>
            </li>
          </ul>
        </div>
      </nav>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/carousel-driver/221010-Max-Verstappen-ew-1132a-276412.jpg" alt="First slide" width="100%">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/carousel-driver/nico.jpg" alt="Second slide" width="100%">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/carousel-driver/vettel.jpg" alt="Third slide" width="100%">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/carousel-driver/fernando-alonso.jpg" alt="Fourth slide" width="100%">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/carousel-driver/jim-clark-team-lotus-celebrate.jpg" alt="Fifth slide" width="100%">
            </div>
          </div>
      </div>
      <main class="container">
        <header class="head">
            <h1 class="title">Formula 1 Drivers</h1>
            <p class="desc">Formula 1 drivers hall of fame</p>
        </header>
         <!-- Driver Card -->
         <section class="driver-cards">
            <?php foreach ($drivers as $driver) { ?>
                <div class="card mb-3" data-bs-toggle="modal" data-bs-target="#driverModal<?php echo $driver['Driver_ID']; ?>" >
                    <img src="<?php echo $driver['Driver_Image']; ?>" class="card-img-top" alt="Driver Image">
                    <!-- <h1></h1> -->
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $driver['Full_Name']; ?></h5>
                        <p class="card-text">Nationality: <?php echo $driver['Nationality']; ?></p>
                        <p class="card-text">Born Date: <?php echo $driver['Born_Date']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </section>
      </main>

      <!-- Driver Modals -->
      <?php foreach ($drivers as $driver) { ?>
        <div class="modal fade" id="driverModal<?php echo $driver['Driver_ID']; ?>" tabindex="-1" aria-labelledby="driverModal<?php echo $driver['Driver_ID']; ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="driverModal<?php echo $driver['Driver_ID']; ?>Label"><?php echo $driver['Full_Name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo $driver['Driver_Image']; ?>" class="img-fluid mb-3" alt="Driver Image">
                        <p><strong>Nationality:</strong> <?php echo $driver['Nationality']; ?></p>
                        <p><strong>Born Date:</strong> <?php echo $driver['Born_Date']; ?></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
      <?php } ?>
      <!-- Driver Modals -->
      <!-- Modal 1: Lewis Hamilton -->
      <div class="modal fade" id="driverModalLewisHamilton" tabindex="-1" aria-labelledby="driverModalLewisHamiltonLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="driverModalLewisHamiltonLabel">Lewis Hamilton</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <img src="images/drivers/sebastian-vettel-aston-martin-.jpg" class="img-fluid mb-3" alt="Driver Image">
                      <p><strong>Nationality:</strong> British</p>
                      <p><strong>Born Date:</strong> 1985-01-07</p>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal 2: Max Verstappen -->
      <div class="modal fade" id="driverModalMaxVerstappen" tabindex="-1" aria-labelledby="driverModalMaxVerstappenLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="driverModalMaxVerstappenLabel">Max Verstappen</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <img src="images/drivers/sebastian-vettel-aston-martin-.jpg" class="img-fluid mb-3" alt="Driver Image">
                      <p><strong>Nationality:</strong> Dutch</p>
                      <p><strong>Born Date:</strong> 1997-09-30</p>
                      <p><strong>Racing Number:</strong> 33</p>
                      <!-- Additional details can be added here -->
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
        
    </div>
      </main>
      <footer class="row">
      <div class="contact col-md">
        <a href="index.php">Home</a>
        <a href="drivers.php">Driver</a>
        <a href="teams.php">Team</a>
        <a href="https://www.formula1.com/">Official F1 Website</a>
    </div>
        <div class="form col-md">
          <p class="form-title">Give Us A Feedback!</p>
          <input type="email" name="" id="" class="form-item" placeholder="Your name">
          <input type="text" name="" id="" class="form-item" placeholder="Your e-mail">
          <textarea name="" id="" rows="6" class="form-item" placeholder="Your feedback"></textarea>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="scripts/script.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>AOS.init();</script>
</body>
</html>