<?php
include '../connection.php';

if(isset($_REQUEST["listz"])){
    $sql = "SELECT * FROM books WHERE bookTitle LIKE ? OR deweyDecimal LIKE ? OR bookSubject LIKE ? OR ISBN LIKE ? OR booksubject Like ? OR bookAuthors Like ?";
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssss", $param_term, $param_term, $param_term, $param_term, $param_term, $param_term);
        $param_term = $_REQUEST["listz"] . '%';
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

 if(isset($_REQUEST["term"])){
    $sql = "SELECT reserve.resereID, books.bookTitle, libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName 
    FROM reserve 
    JOIN books ON books.bookId = reserve.bookId 
    JOIN libraryuser ON libraryuser.libraryUserId = reserve.libraryUserId 
    WHERE reserve.status IN ('Approved','RETURN BOOK') and libraryuser.libraryUserFirtsName LIKE ? OR libraryuser.libraryUserLastName LIKE ?  
    ";
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_term, $param_term);
        $param_term = $_REQUEST["term"] . '%';
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='borrow-overview.php?overview=".$row['resereID']."' onclick='return confirm('LOOK')' ><p>Person : <u> " . $row["libraryUserFirtsName"]." ". $row["libraryUserLastName"]."</u> <br> Book : " . $row["bookTitle"]."</p></a>";
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


 if(isset($_REQUEST["borrowonsite"])){
    $sql = "SELECT borrowbook.borrowID, books.bookTitle, libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName 
    FROM borrowbook 
    JOIN books ON books.bookId = borrowbook.bookId 
    JOIN libraryuser ON libraryuser.libraryUserId = borrowbook.libraryUserId 
    WHERE borrowbook.status IN ('Approved','RETURN BOOK') and libraryuser.libraryUserFirtsName LIKE ? OR libraryuser.libraryUserLastName LIKE ?  
    ";
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_termon, $param_termon);
        $param_termon = $_REQUEST["borrowonsite"] . '%';
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='borrow-overview-onsite.php?overview=".$row['borrowID']."' onclick='return confirm('LOOK')' ><p>Person : <u> " . $row["libraryUserFirtsName"]." ". $row["libraryUserLastName"]."</u> <br> Book : " . $row["bookTitle"]."</p></a>";
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