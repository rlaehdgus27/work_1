<?php

 
    $con=mysqli_connect('127.0.0.1:3307', 'root', '123456789', 'database');
    
    $title= mysqli_real_escape_string($con,$_POST['title']);
    $contents= mysqli_real_escape_string($con,$_POST['contents']);
    $no= mysqli_real_escape_string($con,$_POST['no']);

    switch($_GET['mode']){
            case 'insert';
                
                $result= mysqli_query("INSERT INTO board(title, contents, date) VAlUES('$title', '$contet', now())");
                header("Location: List.php");
                break;
            
            case 'delete';
                
                mysqli_query('DELETE FROM board WHERE no= '.$no);
                header("Location: List.php");
                break;
            
            case 'modify';
                
                mysqli_query('UPDATE board SET title="'.mysqli_real_escape_string($_POST['title']).'", contents= "'. mysqli_real_escape_string($_POST['contents']).'" WHERE no='.mysqli_real_escape_string($_POST['no']));
                header("Location: List.php?no={$_POST['no']}");
                break;
    }
    ?>