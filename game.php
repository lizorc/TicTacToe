<!------------------------------------------------>
<!--      Here begins the php development       -->
<!------------------------------------------------>

<?php
    $winner = 'n';
    // PLAY AREAS
    $box = array ('','','','','','','','','');

    // CHECK TO SEE IF WE HAVE SOME "POST" DATA, IF WE DO PROCESS IT
    if (isset($_POST['submitbtn'])){
        // ASSIGN A NAME TO EACH SPACE
        $box[0] = $_POST["box0"];
        $box[1] = $_POST["box1"];
        $box[2] = $_POST["box2"];
        $box[3] = $_POST["box3"];
        $box[4] = $_POST["box4"];
        $box[5] = $_POST["box5"];
        $box[6] = $_POST["box6"];
        $box[7] = $_POST["box7"];
        $box[8] = $_POST["box8"];

        //   CHECK IF THREE "x" ARE PLACED FOR THE PLAYER WINS
        if (($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x') ||
            ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x') ||
            ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x') ||
            ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x') ||
            ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') ||
            ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') ||
            ($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x') ||
            ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x') ){
                $winner = 'x';
                // PRINTS THE NOTIFICATION THAT THE HUMAN PLAYER WINS
                print("</br></br> <img  class = 'Results' src = 'img/Win.png' alt = 'Win'> </br>");
        }

        $temp = 0;
        // COUNTER SO THAT THE COMPUTER CAN PLAY
        for ($i = 0; $i <= 8; $i++){
            if ($box[$i] == ''){
                $temp = 1;
            }
        }
        // CHECK IF THE COMPUTER CAN PLAY AND NO ONE HAS WON
        if ($temp == 1 && $winner == 'n'){
            $i = rand() % 8;
            // RANDOMLY PLACED THE COMPUTER'S PLAYER
            while ($box[$i] != ''){
                $i = rand() %8;
            }
            // ASKS IF THE HUMAN PLAYER IS ABOUT TO WIN IN ANY OF THE POSSIBLE WAYS FOR THE COMPUTER TO AVOID 
            if (($box[3] == 'x' && $box[6] == 'x') || ($box[4] == 'x' && $box[8] == 'x') || ($box[1] == 'x' && $box[2] == 'x')) {
                $box[0] = 'o';
            } else if (($box[0] == 'x' && $box[2] == 'x') || ($box[4] == 'x' && $box[7] == 'x')){
                $box[1] = 'o';
            } else if (($box[0] == 'x' && $box[1] == 'x') || ($box[5] == 'x' && $box[8] == 'x') || ($box[4] == 'x' && $box[6] == 'x')){
                $box[2] = 'o';
            } else if (($box[0] == 'x' && $box[6] == 'x') || ($box[4] == 'x' && $box[5] == 'x')) {
                $box[3] = 'o';
            } else if (($box[0] == 'x' && $box[8] == 'x') || ($box[2] == 'x' && $box[6] == 'x') || ($box[1] == 'x' && $box[7] == 'x') || ($box[3] == 'x' && $box[5] == 'x')){
                $box[4] = 'o';
            } else if (($box[2] == 'x' && $box[8] == 'x') || ($box[3] == 'x' && $box[4] == 'x')){
                $box[5] = 'o';
            } else if (($box[0] == 'x' && $box[3] == 'x') || ($box[2] == 'x' && $box[4] == 'x') || ($box[7] == 'x' && $box[8] == 'x')) {
                $box[6] = 'o';
            } else if (($box[6] == 'x' && $box[8] == 'x') || ($box[1] == 'x' && $box[4] == 'x')){
                $box[7] = 'o';
            } else if (($box[0] == 'x' && $box[4] == 'x') || ($box[2] == 'x' && $box[5] == 'x') || ($box[6] == 'x' && $box[7] == 'x')){
                $box[8] = 'o';
            } else {
                // OTHERWISE THE COMPUTER RANDOMLY PLACES IT
                $box[$i] = 'o';
            } 
            // CHECK IF THREE "o" ARE PLACED FOR THE PLAYER WINS
            if (($box[0] == 'o' && $box[1] == 'o' && $box[2] == 'o') ||
                ($box[3] == 'o' && $box[4] == 'o' && $box[5] == 'o') ||
                ($box[6] == 'o' && $box[7] == 'o' && $box[8] == 'o') ||
                ($box[0] == 'o' && $box[3] == 'o' && $box[6] == 'o') ||
                ($box[1] == 'o' && $box[4] == 'o' && $box[7] == 'o') ||
                ($box[2] == 'o' && $box[5] == 'o' && $box[8] == 'o') ||
                ($box[0] == 'o' && $box[4] == 'o' && $box[8] == 'o') ||
                ($box[2] == 'o' && $box[4] == 'o' && $box[6] == 'o') ){
                    $winner = 'o';
                    // PRINTS THE NOTIFICATION THAT THE COMPUTER WINS OR THE HUMAN PLAYER LOST
                    print("</br></br>  <img  class = 'Results' src = 'img/Lose.png' alt = 'Lose'> ");
            } 
        } 
        // IF NO ONE WINS IT'S SAID THAT THERE WAS A TIE
        else if ($winner == 'n'){
                $winner = 't';
                print("</br> <img  class = 'Results' src = 'img/Tie.png' alt = 'Tie'>");
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
        <title> ¡TicTacToe! - Game</title>
        <!--  INTRODUCE THE THUMBNAEL IMAGE OF THE PAGE  -->
        <link rel="shortcut icon" href="img/MiniLogo.png" />
        <!--  ALLOWS THE USE OF THE .css DOCUMENT  -->
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <!--  DECORATION OF THE TOP  -->
        <div class = "Upper-Bar-W">
            <div class = "Upper-Bar-B">
                <div class = "Upper-Bar-P">
                    <!--  WELCOME MESSAGE   -->
                    <h1> ¡Welcome! </h1>
                    <!--  BUTTON THAT ALLOWS TO RETURN TO THE index.php   -->
                    <a class = "button-logout" href="index.php">Log out</a>
                </div>
            </div>
        </div>
        
        <!--------------------------------------------------------->
        <!--                  START THE GAME FORM                -->
        <form name="tictactoe" action = "game.php" method = "post">
            <!---------------------------------->
            <!--      SMALL PART IN PHP       -->
            <!---------------------------------->
            <?php
                // PRINT THE GAME BOX
                for ($i = 0; $i <= 8; $i++){
                    printf('<input type = "text" name= "box%s" value = "%s" class = "box-game">', $i, $box[$i] );
                    if ($i == 2 || $i == 5 || $i == 8){
                            print('<br>');
                    }
                }
                // CHECK TO SEE IF ANYONE'S WON THE "Next" BUTTON
                if ($winner == 'n'){
                    print('</br> <input type = "submit" name = "submitbtn" value = "Next" class = "button-next">');
                } else {
                    // IF I FINISH THE GAME, THE BUTTON "Play Again" APPEARS WHICH WILL REFRESH THE PAGE FROM THE BEGINNING
                    print('</br><input type = "button" name = "newgamebtn" value = "Play Again" 
                        class = "button-again" onclick = "window.location.href=\'game.php\'" >');
                }
            ?>
        </form>
        <!--                   END THE GAME FORM                 -->
        <!--------------------------------------------------------->
    </body>
</html>