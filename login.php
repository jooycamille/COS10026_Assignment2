<?php
    session_start();

    include("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        // die("Connection failed: " . mysqli_connect_error());
        echo "Connection to database error";
    }
    else {
        if(isset($_POST['username']) && isset($_POST['userpwd'])) {
            function validate ($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
    
            $username = validate($_POST['username']);
            $userpwd = validate($_POST['userpwd']);
    
            if (empty($username) && empty($userpwd)) {
                header("Location: loginform.php?error=username and password required");
                exit();
            }
            else {
                $sql = "select * FROM $sql_tbl WHERE (username = '$username') AND (userpwd = '$userpwd')";
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
    
                    if($row['username'] === $username && $row['userpwd'] === $userpwd) {
                        echo "<p>Logged In</p>";
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['usersid'] = $row['usersid'];
                        header("Location: manage.php");
                        exit();
                    }
                    else {
                        header("Location: loginform.php?error=incorrent username or password");
                        // echo "error no username found";
                        // exit();
                    }
                }
                else {
                    header("Location: loginform.php?error=incorrent username or password");
                    // echo "error result";
                    exit();
                }
            }
        }
        else {
            header("Location: loginform.php");
            // echo "error validate";
            exit();
        }
    }
