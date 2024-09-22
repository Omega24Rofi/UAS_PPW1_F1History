<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula 1 Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style3.css">
    <link rel="stylesheet" href="styles/style4.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between fixed-top custom-bg">
        <a class="navbar-brand" href="index.html">
            <img src="images/Asset 1.png" width="150" height="auto" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
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
            <img class="d-block w-100" src="images/carousel-teams/Mercedes-F1-pit-wall.webp" alt="First slide" width="100%">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/carousel-teams/sergio-perez-red-bull-racing-r.jpg" alt="Second slide" width="100%">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/carousel-teams/GettyImages-1164566790.avif" alt="Third slide" width="100%">
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
            <h1 class="title">Formula 1 Teams</h1>
            <p class="desc">Explore the teams in Formula 1</p>
        </header>

        <section class="team-cards">
            <?php
            include 'connect.php';
            $sql = "SELECT Team_Name, Win_Amount, Base_Location, Establish, Team_Logo FROM Team";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $modalId = 'teamModal' . str_replace(' ', '', $row['Team_Name']);
                    echo '
                    <div class="card mb-3" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">
                        <img src="' . strtolower(str_replace(' ', '-', $row['Team_Logo'])) . '" class="card-img-top" alt="Team Image">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["Team_Name"] . '</h5>
                            <p class="card-text">Base Location: ' . $row["Base_Location"] . '</p>
                            <p class="card-text">Established: ' . $row["Establish"] . '</p>
                            <p class="card-text">Wins: ' . $row["Win_Amount"] . '</p>
                        </div>
                    </div>
            
                    <div class="modal fade" id="' . $modalId . '" tabindex="-1" aria-labelledby="' . $modalId . 'Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="' . $modalId . 'Label">' . $row["Team_Name"] . '</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="' . strtolower(str_replace(' ', '-', $row['Team_Logo'])) . '" class="img-fluid mb-3" alt="Team Image">
                                    <p><strong>Base Location:</strong> ' . $row["Base_Location"] . '</p>
                                    <p><strong>Established:</strong> ' . $row["Establish"] . '</p>
                                    <p><strong>Wins:</strong> ' . $row["Win_Amount"] . '</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "0 results";
            }
            

            $conn->close();
            ?>
        </section>
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

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <script src="scripts/script.js"></script>
</body>
</html>
