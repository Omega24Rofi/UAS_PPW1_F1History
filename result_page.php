<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Season <?php echo $season_id; ?> Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style2.css">
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

    <main class="container">
        <?php
            include 'connect.php';

            // Fetch season details based on season_id
            $season_id = $_GET['season_id'];

            // Query to fetch champion details and image
            $champion_query = "SELECT Drivers.Full_Name AS Driver_Name, Team.Team_Name, ResultImages.ResultImage
                              FROM Result
                              JOIN Drivers ON Result.Driver_ID = Drivers.Driver_ID
                              JOIN Team ON Result.Team_ID = Team.Team_ID
                              JOIN ResultImages ON Result.Result_ID = ResultImages.Result_ID
                              WHERE Result.Season_ID = $season_id AND Result.Position = 1";
            $champion_result = $conn->query($champion_query);

            if ($champion_result->num_rows > 0) {
                $champion_data = $champion_result->fetch_assoc();
                $champion_driver_name = $champion_data['Driver_Name'];
                $champion_team_name = $champion_data['Team_Name'];
                $champion_image = $champion_data['ResultImage'];
            } else {
                $champion_driver_name = "Unknown";
                $champion_team_name = "Unknown";
                $champion_image = ""; // Provide a default image path if needed
            }

            // Query to fetch race results
            $race_results_query = "SELECT Result.Position, Drivers.Full_Name AS Driver_Name, Team.Team_Name, Race.Race_Name, Race.Race_Date
                                  FROM Result
                                  JOIN Drivers ON Result.Driver_ID = Drivers.Driver_ID
                                  JOIN Team ON Result.Team_ID = Team.Team_ID
                                  JOIN Race ON Result.Race_ID = Race.Race_ID
                                  WHERE Result.Season_ID = $season_id";
            $race_results_result = $conn->query($race_results_query);

            if ($race_results_result->num_rows > 0) {
                ?>
                <header class="head">
                    <!-- Displaying champion image similar to result-card -->
                    <div class="result-card">
                        <img src="<?php echo $champion_image; ?>" alt="Champion Car" width="100%">
                        <div class="card-details"style="text-align: center;">
                            <h2 class="season-text" style="font-weight : bold; margin-top: 2vh;  text-decoration: underline solid #780000;">Season <?php echo $season_id; ?></h2>
                            <p class="mini-title">Driver: <?php echo $champion_driver_name; ?></p>
                            <p class="mini-title">Team: <?php echo $champion_team_name; ?></p>
                        </div>
                    </div>
                    <?php
                        // Query to fetch season description
                        $season_desc_query = "SELECT Description FROM SeasonDescriptions WHERE Season_ID = $season_id";
                        $season_desc_result = $conn->query($season_desc_query);

                        if ($season_desc_result->num_rows > 0) {
                            $season_desc_data = $season_desc_result->fetch_assoc();
                            $season_description = $season_desc_data['Description'];
                            echo "<p class='desc'>$season_description</p>";
                        } else {
                            echo "<p class='desc'>Description not available.</p>";
                        }
                    ?>
                </header>

                <section>
                    <h2>Race Result</h2>
                    <div class="table-container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Balapan</th>
                                    <th>Tanggal</th>
                                    <th>Sirkuit</th>
                                    <th>Pemenang</th>
                                    <th>Tim</th>
                                    <th>Posisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Output data of each race result
                                    while($row = $race_results_result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Race_Name'] . "</td>";
                                        echo "<td>" . $row['Race_Date'] . "</td>";
                                        echo "<td>Sirkuit Name</td>"; // Replace with actual circuit name from database
                                        echo "<td>" . $row['Driver_Name'] . "</td>";
                                        echo "<td>" . $row['Team_Name'] . "</td>";
                                        echo "<td>" . $row['Position'] . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>

                <?php
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>

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
