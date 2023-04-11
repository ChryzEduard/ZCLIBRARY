<?php
 require_once "../connection.php"; 
 if(isset($_REQUEST["term"])){
    $sql = "SELECT * FROM books WHERE bookTitle LIKE ? OR deweyDecimal LIKE ? OR bookSubject LIKE ? OR ISBN LIKE ? OR booksubject Like ? OR bookAuthors Like ?";
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssss", $param_term, $param_term, $param_term, $param_term, $param_term, $param_term);
        $param_term = $_REQUEST["term"] . '%';
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='book-overview.php?overview=".$row['bookId']."' onclick='return confirm(' Book Overview')' ><p>" . $row["bookTitle"]."</p></a>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
    mysqli_stmt_close($stmt);
 }


?>