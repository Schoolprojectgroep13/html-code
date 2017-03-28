<?php
require('../app/database.php');
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header>
            <div class="container">
                <div class="logo row-spaced">
                    <img src="img/ant_left.png" alt="Ant" class="logo-pic">
                    <h1>De Gokkers</h1>
                    <img src="img/ant_right.png" alt="Ant" class="logo-pic">
                </div>
            </div>
        </header>
        <nav>
            <div class="container row-spaced">
                <ul class="row-spaced">
                    <li><a href="">Home</a></li>
                    <li><a href="">Login/Register</a></li>
                    <li><a href="">Download</a></li>
                    <li><a href="">Info</a></li>
                </ul>
                <?php
                if (isset($_SESSION['logged_in']))
                {
                    if ($_SESSION['logged_in'] == true)
                    {
                        echo "<li><a href='../app/logout.php'>Uitloggen</a></li>";
                    }
                }
                ?>
            </div>
        </nav>
        <div class="banner">
            <div class="container">
                <h2>The Game</h2>
                <div class="banner-items row-spaced">
                    <div class="banner-video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/insM7oUYNOE" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="banner-tekst">
                        <h3>De Gokkers</h3>
                        <p>This little game is based of the famous horse gamble games. But instead of it having horses this game has 10 ants. Play it alone or with up to 2 others people. Register or login and download it below!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="register">
            <div class="container">
	            <div class="regist">
	                <h2>Register:</h2>

	                <form action="../app/register.php">
	                    <div class="form-group">
	                        <label for="email">Email address:</label>
	                        <input type="email" name="email" id="email" placeholder="E-Mail" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="password">Password:</label>
	                        <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}" required>
	                    </div>
	                    <div class="form-group">
	                        <input type="submit" value="Registreer">
	                    </div>
	                </form>
	            </div>

				<div class="login">
	                <h2>Login:</h2>

	                <form action="../app/login.php">
	                    <div class="form-group">
	                        <label for="email">Email address:</label>
	                        <input type="email" name="email" id="email" placeholder="E-Mail" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="password">Password:</label>
	                        <input type="password" name="password" id="password" placeholder="Password" required>
	                    </div>
	                    <div class="form-group">
	                        <input type="submit" value="Login">
	                    </div>
	                </form>
	            </div>
            </div>
            	<?php
				    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
				    {
				        $message = 'Inloggen mislukt';
				    }

				  	if (isset($_GET['message']))
				  	{
				  	    echo '<p>' . $_GET['message'] . '</p>';
				  	}
    			?>
        </div>
        <div class="download">
            <div class="container">
                <h2>Download the game</h2>
                <?php
                if (isset($_SESSION['logged_in']))
                {
                    if ($_SESSION['logged_in'] == true)
                    {
                        echo "<a href='../storage/De%20gokkers.zip' id='downloadlink'>Click here to download</a>";
                    }
                    else
                    {
                        echo "Login to download the game";
                    }
                }
                else
                {
                    echo "Login to download the game";
                }
                ?>
            </div>
        </div>
        <div class="info">
            <div class="container">
                <h2>Information</h2>
                <div class="info-items row-spaced">
                    <div class="info-tekst">
                        <h3>Application</h3>
                        <p>In this game you play as 3 characters (or you play it with friends). You try to bet which ant is going to win the race. After you bet you press start and the ants start walking to the finish line. If a ant finishes you get the message of which one won. After that you press the reset button and everything starts over.</p>
                    </div>
                    <div class="info-tekst">
                        <h3>Creators</h3>
                        <p>The people who worked together on this little project are a part of the school Radius college in the netherlands. Together they formed group 13. The names of the people in group 13 are:</p>
                        <p>Tim de Greeuw</p>
                        <p>Jeffrey van der Wal</p>
                        <p>Rafik Zekhnini</p>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <p>Copyright © | Radius college | Jeffrey van der Wal | Group 13</p>
            </div>
        </footer>
        <!-- Stop here with adding!-->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
