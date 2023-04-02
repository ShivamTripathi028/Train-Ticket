<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="home.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Spirax&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet" />
    <title>Home Page</title>
</head>

<body onload="javascript:getQuote()">
    <div class="parent">
        <div class="search">
            <div class="search-box">
                <div class="inner">
                    <h2 class="heading">Book Ticket</h2>
                    <div style="
                max-width: 450px;
                min-width: 450px;
                display: flex;
                justify-content: space-between;
              ">
                        <select name="from" id="from" style="width: 220px">
                            <option disabled selected>From</option>
                        </select>
                        <select name="from" id="from" style="width: 210px">
                            <option disabled selected>To</option>
                        </select>
                    </div>
                    <div style="
                max-width: 450px;
                min-width: 450px;
                display: flex;
                justify-content: space-between;
              ">
                        <input type="date" id="data" placeholder="Date" />
                        <select name="coach" id="coach" style="width: 200px">
                            <option disabled selected>Select class:</option>
                            <option value="AC First">AC First Class (1A)</option>
                            <option value="AC Second">AC 2 Tier (2A)</option>
                            <option value="AC Third">AC 3 Tier (3A)</option>
                            <option value="Sleeper">Sleeper (SL)</option>
                        </select>
                    </div>
                    <input type="button" class="btn" name="btn" value="Search" />
                </div>
            </div>
        </div>
        <div class="text">
            <div class="quote-container">
                <h1 class="quote" id="quote"></h1>
                <p id="author"></p>
            </div>
            <div class="user">
                <h1>Welcome, <?php echo $_SESSION['user'] ?></h1>
            </div>
        </div>
    </div>
</body>

</html>