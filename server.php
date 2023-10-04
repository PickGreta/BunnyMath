<?php
session_start();

$errors=array();
$db = mysqli_connect("localhost", "root", "", "web2");

if ($db -> connect_error) {
    echo "Failed to connect to MySQL: " . $db -> connect_error;
    exit();
}

if (isset($_POST['registration'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
  
    if (empty($username)) { array_push($errors, "Nem adtál meg felhasználónevet."); }
  
    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
      if ($user['username'] === $username) {
        array_push($errors, "Ez a felhasználónév már létezik.");
      }
    }
  
    if (count($errors) == 0) {  

        $query = "INSERT INTO users (username) 
                  VALUES('$username')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Sikeresen bejelentkeztél!";
        header('location: index.php');
    }
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
  
    if (empty($username)) {
        array_push($errors, "Nem adtál meg felhasználónevet.");
    }
  
    if (count($errors) == 0) {

        $query = "SELECT * FROM users WHERE username='$username'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Sikeresen bejelentkeztél!";
          header('location: index.php');
        } else {
            array_push($errors, "Nincs ilyen felhasználónév az adatbázisban.");
        }
    }
}

if (isset($_POST['result'])) {
        $username=$_SESSION['username'];
        $score = $_POST['result'];
        $scoreboard_query = "SELECT high_score FROM users WHERE username='$username' ";
        $scoreboard_result = mysqli_query($db, $scoreboard_query);
        $highscore = mysqli_fetch_assoc($scoreboard_result);
        if ($score>$highscore['high_score']){
            $leaderboard_query = "UPDATE users SET high_score=$score WHERE username='$username' ";
            $leaderboard_result = mysqli_query($db, $leaderboard_query);
        }   
}

if(isset($_POST['lb'])){
    $leaderboard_query = "SELECT username, high_score FROM users ORDER BY high_score DESC";
    $leaderboard_result = mysqli_query($db, $leaderboard_query);

    $rank = 1;

    if(mysqli_num_rows($leaderboard_result)){
        while($row = mysqli_fetch_array($leaderboard_result)) {
            echo "<tr>
            <td>{$rank}</td>
            <td>{$row['username']}</td>
            <td>{$row['high_score']}</td>
            </tr>";
            $rank++;
        }
    }
}
?>