<!------------------------------------------------>
<!--      Here begins the php development       -->
<!------------------------------------------------>

<?php
    $salt = 'dju@si_1';
    // THE PASSWORD IS  tictactoe123
    $pass = 'tictactoe123'; 
    // USE THE METHOD md5 TO CALCULATE THE MD5 HASH OF A CHAIN
    $pass_hash = md5($salt.$pass); 
    $failure = false; 

    // CHECK TO SEE IF WE HAVE SOME "POST" DATA, IF WE DO PROCESS IT
    if ( isset($_POST['user']) && isset($_POST['pass']) ) {
        $check = hash('md5', $salt.$_POST['pass']);
        // CHECK TO SEE $check EQUALS TO $pass_hash
        if ( $check == $pass_hash ) {
            // REDIRECT THE BROWSER TO game.php
            header("Location: game.php?user=".urlencode($_POST['user']));
            return;
        } else {
            // IF THE PROCESS FAILS, IT SENDS AN ERROR MESSAGE
            $failure = "Incorrect password";
        }
    }
?>
<!------------------------------------------------>
<!--      Here begins the html development      -->
<!------------------------------------------------>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> ¡TicTacToe! </title>
        <!--  INTRODUCE THE THUMBNAEL IMAGE OF THE PAGE  -->
        <link rel="shortcut icon" href="img/MiniLogo.png" />
        <!--  ALLOWS THE USE OF THE .css DOCUMENT  -->
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <!--                PLACE THE IMAGE OF THE TITLE                -->
        <img class = "title" src = "img/Logo_TTT.png" alt = "Logo_TicTacToe"> 
        <div class="box-login">
            <!----------------------------------------------------------------------->
            <!--                       START THE LOG IN FORM                       -->
            <!-- THE required TAG DOESN'T ALLOW TO CONTUNUE IF THAT FIELD IS NULL  --> 
            <form method="POST"> 
                <!--  NAME AND SPACE TO ENTER THE USER  -->
                <label class = "text-login">
                    <p>  Username  </p>
                    <input class = "input-user"  name="user" type="text" required>
                </label>
                <!--  NAME AND SPACE TO ENTER THE PASSWORD  -->
                <label class = "text-login">
                    <p>  Password </p>
                    <input class = "input-pass" name="pass" type="password" required>
                </label>
                <!--  BUTTON TO GO TO game.php  -->
                <p><input class="button-login" type="submit" value="Log in"></p>
            </form>
            <!--                        END THE LOG IN FORM                        -->
            <!----------------------------------------------------------------------->
            
            <!--     PRINT THE ERROR MESSAGE CREATED IN THE PHP PART     --> 
            <span class="pass-incorrect"> <?=htmlentities($failure)?> </span> 
        </div>
    </body>
</html>


