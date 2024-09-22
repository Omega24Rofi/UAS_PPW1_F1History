<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between fixed-top custom-bg">
        <a class="navbar-brand" href="#">
            <img src="images/Asset 1.png" width="150" height="auto" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
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

    <div class="vid-banner">
      <img src="images/logo.png" alt="" class="logo" data-aos="fade-up">
      <video src="images/video/y2mate.com - 70th Anniversary Grand Prix F1 Silverstone Special Opening Title F1 Intro_1080pFHR.mp4" type="mp4" autoplay muted loop height="100%" width="auto"></video>
    </div>

    <main class="container">
        <header class="head">
            <h1 class="title">F1 History</h1>
            <p class="desc" >
                Formula 1, often referred to as F1, is the pinnacle of motorsport that has been founded since 1950. It features the world's fastest cars and most skilled drivers competing in a series of high-speed races held on circuits around the globe. The sport combines cutting-edge technology with strategic racing tactics, where teams and drivers vie for championships in a season that tests both speed and endurance. Formula 1 races are characterized by their thrilling overtakes, precise engineering, and the glamorous aura surrounding its drivers and teams.</p>
        </header>

        <div class="decade-list row">
        <button class="decade-button decade-5060 col-md" onclick="window.location.href='index.php?decade=5060';">50s-60s</button>

            <button class="decade-button decade-7080 col-md" onclick="window.location.href='index.php?decade=7080';">70s-80s</button>
            <button class="decade-button decade-8090 col-md" onclick="window.location.href='index.php?decade=8090';">80s-90s</button>
            <button class="decade-button decade-9000 col-md" onclick="window.location.href='index.php?decade=9000';">90s-00s</button>
            <button class="decade-button decade-1020 col-md" onclick="window.location.href='index.php?decade=1020';">10s-20s</button>
            <button class="decade-button decade-now col-md" onclick="window.location.href='index.php?decade=Now';">All</button>
        </div>

        <article>
        <?php
include 'connect.php';

// Define a default decade or year range if $_GET['decade'] is not set
$decade = isset($_GET['decade']) ? $_GET['decade'] : '';

// Calculate year range based on the decade
switch ($decade) {
    case '5060':
        $condition = "Season_ID >= '1950' AND Season_ID < '1970'";
        break;
    case '7080':
        $condition = "Season_ID >= '1970' AND Season_ID < '1990'";
        break;
    case '8090':
        $condition = "Season_ID >= '1980' AND Season_ID < '2000'";
        break;
    case '9000':
        $condition = "Season_ID >= '1990' AND Season_ID < '2010'";
        break;
    case '1020':
        $condition = "Season_ID >= '2010' AND Season_ID < '2030'";
        break;
    case 'now':
        $condition = "Season_ID >= '2020'";
        break;
    default:
        $condition = ""; 
        break;
}


$sql = "SELECT Result.Result_ID, Result.Season_ID, Result.Position, Drivers.Full_Name AS Driver_Name, Team.Team_Name, Race.Race_Name, ResultImages.ResultImage
        FROM Result
        JOIN Drivers ON Result.Driver_ID = Drivers.Driver_ID
        JOIN Team ON Result.Team_ID = Team.Team_ID
        JOIN Race ON Result.Race_ID = Race.Race_ID
        JOIN ResultImages ON Result.Result_ID = ResultImages.Result_ID";

if (!empty($condition)) {
    $sql .= " WHERE Result.Season_ID IN (SELECT Season_ID FROM Season WHERE " . $condition . ")";
}

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query execution was successful
if ($result) {
    ob_start();

    // Fetch all rows from the result set
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Process each row
    foreach ($rows as $row) {
        ?>
        <a href="result_page.php?season_id=<?php echo $row['Season_ID']; ?>" class="result-card" data-aos="fade-up">
            <div class="result">
                <img src="<?php echo $row['ResultImage']; ?>" alt="Result Image" width="100%">
                <div class="result-title">
                    <p><?php echo $row['Season_ID']; ?></p>
                </div>
                <div class="result-desc">
                    <p class="driver-name"><?php echo $row['Driver_Name']; ?></p>
                    <p class="team-name"><?php echo $row['Team_Name']; ?></p>
                </div>
            </div>
        </a>
        <?php
    }

    // End output buffering and capture the generated HTML
    $html_output = ob_get_clean();

    // Output the generated HTML
    echo $html_output;

    // Free result set
    mysqli_free_result($result);
} else {
    // Handle query error
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>


        </article>
    </main>
    <footer class="row">
      <div class="contact col-md">
        <a href="#">Home</a>
        <a href="drivers.html">Driver</a>
        <a href="teams.html">Team</a>
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
    <script>
        AOS.init();
    </script>
    <script>
    $(document).ready(function() {
        $('.decade-button').click(function() {
            var decade = $(this).data('decade');

            $(this).addClass('active').siblings().removeClass('active');
            $('.result-card').show();

            // Hide result-cards that do not match the selected decade
            if (decade !== 'now') {
                $('.result-card').not('.decade-' + decade).hide();
            } else {
                $('.result-card').not('[class*=decade-]').hide();
            }
        });
    });
</script>
</body>
</html>
