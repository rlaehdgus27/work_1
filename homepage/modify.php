<?php
    
    include("db.php");

    mysqli_connect('127.0.0.1:3307', 'root', '123456789','database');
    
    $no= mysqli_real_escape_string($db,$_GET['no']);
    $result = mysqli_query($db,'SELECT * FROM board WHERE no = '.$no);
    $board = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>   
    <body>
        <form action="./process.php?mode=modify" method="POST">
            <input type="hidden" name="no" value="<?=$board['no']?>" />
            <p>제목 : <input type="text" name="title" value="<?=htmlspecialchars($board['title'])?>"></p>
            <p>본문 : <textarea name="description" id="" cols="30" rows="10"><?=htmlspecialchars($board['contents'])?></textarea></p>
            <p><input type="submit" /></p>
        </form>
    </body>
</html>
