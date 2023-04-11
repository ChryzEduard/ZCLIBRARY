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
                    echo "<a href='bookoverview.php?overview=".$row['bookId']."' onclick='return confirm(' Book Overview')' ><p>" . $row["bookTitle"]."</p></a>";
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

if(isset($_REQUEST["term1"])){
    // Prepare a select statement
    $sql = "SELECT * FROM books WHERE bookTitle LIKE ? ";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term1);
        
        // Set parameters
        $param_term1 = $_REQUEST["term1"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='bookoverview.php?overview=".$row['bookId']."' onclick='return confirm(' Book Overview')' ><p>" . $row["bookTitle"]."</p></a>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }


    
     
    // Close statement
    mysqli_stmt_close($stmt);
}




if(isset($_REQUEST["announ"])){
    // Prepare a select statement
    $sql = "SELECT * FROM books WHERE bookTitle LIKE ? ";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_announ);
        
        // Set parameters
        $param_announ = $_REQUEST["announ"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='bookoverview.php?overview=".$row['bookId']."' onclick='return confirm(' Book Overview')' ><p>" . $row["bookTitle"]."</p></a>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }


    
     
    // Close statement
    mysqli_stmt_close($stmt);
}

?>