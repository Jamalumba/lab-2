<?php

function setComments($conn) {
  
    if(isset($_POST['commentSubmit'])) {
      
        $date = $_POST['date'];
        $title = $_POST['title'];
        $message = $_POST['message'];
      

        $sql = "INSERT INTO 'com' ('date', 'title', 'message') VALUES ('$date', '$title', '$message')";
        $result = $conn->query($sql);
        unset($_POST['date']);
        unset($_POST['title']);
        unset($_POST['message']);
        
    }
}

function getComments($conn) {
    $sql = "SELECT DISTINCT* FROM com ORDER BY date DESC LIMIT 100";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment'>
            <br>
            <div class='name'> Unknown </div>
            ".$row['date']."<br>
            <div class='title'> ".$row['title']."<br> </div>
            ".$row['message']."
            <table>
                <tr>
                    <td> <div><br><form method='POST' action='".likeSubmit($row)."'> <button type='submit' name='".$row['id']."' class='likebtn'>❤ Like ".$row["likes"]."</button></form></div> </td>

                </tr>
            </table>
            <br>
        </div>
        <br>";
    }
}

function likeSubmit($row) {    
    require("connection.php");
    if(isset($_POST[$row['id']])) {
        $id = $row['id'];
        $likes = $row['likes']+1;
        $query = "UPDATE comments SET likes = '$likes' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        header('Location: main.php');
        exit;
    }
}
