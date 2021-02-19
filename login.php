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
        <form action="includes/login.inc.php" method="post">
            <h3>Log in</h3>    
          <div id="error_email"></div>
          <input type="text" name="email-user" id="email-user" required placeholder="username/email">      
          <br>
          <input type="password" name="password" id="password" required placeholder="password">
          <br>
          <input type="submit" name="submit" value="Log in" id="button">
          <?php
            if(isset($_GET['error'])) {
              if($_GET['error'] == "wronguseroremail") {
                echo "<P style='color:red'>Wrong user or email!</p>";
              } else if ($_GET['error'] == "wrongpassword") {
                  echo "<p style='color:red'>Wrong password!</p>";
              }
            }
          ?>
          <p>Don´t have an account?<a href="sign.php">sign in</a></p>
        </form>
      </div>
    </div> 
  </main>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>
