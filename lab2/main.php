<?php
    date_default_timezone_set('Europe/Moscow');
    include 'connection.php';
    include 'functions.php';

?>


<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <div class="container">
        <h1>Welcome!</h1>
        
        <?php
            echo "<form method='POST' action='".setComments($conn)."'>
                <input type ='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <div class='title'><a>Title:</a></div>
                <div>
                <textarea name='title'></textarea>
                <div>
                <div class='message'><a>Your message:</a></div>
                <div>
                <textarea name='message'></textarea>
                <div>
                <a href='main.php'><button class='commbtn' type='submit' name='commentSubmit'>Post</button></a>
                <br><br>
                </form>";

            getComments($conn);

        ?>
        <br><br><br>
    </div>

</body>
</html>