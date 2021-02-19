<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <meta name="theme-color" content="#fafafa">
</head>
<body>
  <main>
    <div class ="login">
      <div class="container-form">
        <form action="includes/sign.inc.php" method="post" id ="sign">
            <h3>sign in</h3>
            <input type="text" name="username" id="username" placeholder="username">      
            <br>
            <div id="error_email"></div>
            <input type="text" name="email" id="email"  placeholder="email">      
            <br>
            <input type="password" name="password" id="password"  placeholder="password">
            <br>
            <input type="password" name="password-repeat" id="password-repeat"  placeholder="Repeat password">
            <br>
            <input type="submit" name="submit" value="sign in" id="button">
        </form>
        <?php
      /*Displays error messages*/
      if(isset($_GET['error'])) {
        if($_GET['error'] == "emptyinput") {
          echo "<P style='color:red'>Fill in all fields!</p>";
        } else if ($_GET['error'] == "invalidUid") {
            echo "<p style='color:red'>Invalid username!</p>";
        } else if ($_GET['error'] == "invalidEmail") {
          echo "<P style='color:red'>Invalid email!</p>";
        } else if ($_GET['error'] == "passwordsdontmatch") {
          echo "<P style='color:red'>Passwords don´t match!</p>";
        } else if ($_GET['error'] == "usernamealreadytaken") {
          echo "<P style='color:red'>username already taken!</p>";
        } else if ($_GET['error'] == "stmtfailed") {
          echo "<P style='color:red'>Something went grong, try again!</p>";
        } else if ($_GET['error'] == "none") {
          echo "<P style='color:red'>You have signed up!</p>";
        }
      }
    ?>
      </div>
    </div> 
  </main>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/sign.js"></script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>
