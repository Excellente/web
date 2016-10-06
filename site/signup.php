<?php



?>

<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="css/shared.css">
        <style>
          body {
            background: linear-gradient(rgba(54, 2, 79, 0.5), rgba(114, 36, 0, 0.5)/*rgba(58, 0, 36, 0.5),*/),
            url("http://www.walldevil.com/wallpapers/a63/beautiful-background-sphere-website-backgrounds-different.jpg");
          }
            strong span {
              font-family: 'Ubuntu', sans-serif;
            }
            input {
              text-align: center;
              width: 65%;
              text-shadow: 10px;
              font-size: 20px;
              font-family: 'Roboto', sans-serif;
              padding: 10px 10px 10px 10px;
              margin: 10px 0px;
              border: none;
            }
            #form {
                text-align: center;
                width: 25%;
                height: 48%;
                margin: auto;
                margin-top: 10%;
                padding-top: 2%;
                vertical-align: center;
                background-color: rgba(200,200,200,0.8);
            }
            button {
              width: 40%;
              height: 10%;
              color: white;
              font-size: 20px;
              margin-top: 5%;
              border: none;
              font-weight: bold;
              font-family: avenir next;
              background-color: #112233;
            }
        </style>
    </head>

    <body>
        <div id="header">Create Account</div>
        <div id="picture"><div>
        <div id="form">
            <form action="signup.php" method="post">
              <input type="" placeholder="firstname">
              <br><input type="text" placeholder="lastname">
              <br><input type="text" placeholder="username">
              <br><input type="text" placeholder="email address">
              <br><input type="password" placeholder="password">
              <br><input type="date" placeholder="date of birth">
              <br><button>Create Account</button>
            </form>
        </div>
    </body>
</html>
