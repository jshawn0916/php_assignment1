<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $connection = mysqli_connect("sql311.infinityfree.com","if0_35758286","JxweIwLYWsK","if0_35758286_musicdb");

        //test local db
        // $connection = mysqli_connect('localhost', 'root', 'root', 'music');
        
        $query = 'SELECT * FROM music';
        $musics = mysqli_query($connection, $query);
        if(mysqli_connect_error()){
            die("Connection error;" . mysqli_connect_error());
        }

    ?>
    <?php include('common/header.php') ?>
    <div class="align-wrap">
        <div class="container">
            <div class="title-wrap">
                <h2 class="sub-title">Favorite Songs</h2>
            </div>
            <?php
                foreach($musics as $music){
                    $timeString = $music['length'];
                    $timeParts = explode(":", $timeString);
                    $minute = $timeParts[1];
                    $second = $timeParts[2]; 
                    if($music['genre'] === "K-POP"){
                        $txtClass = 'orange-color';
                    }else if($music['genre'] === "POP"){
                        $txtClass = 'blue-color';
                    }else{
                        $txtClass = 'default';
                    }
                    echo '<div class="list">
                    <div class="content-wrap">
                        <div class="img-wrap">
                          <img src="'.$music['album_cover'].'" class="img-rounded" alt="album-cover">
                        </div>
                        <div class="card-body">
                        <p class="card-text">'.$music['album_title'].'</p>
                          <h2 class="card-title">'.$music['title'].'</h2>
                          <p class="card-text">'.$music['artist'].'</p>
                          <p class="card-text '.$txtClass.'" style="font-weight:bold;">'.$music['genre'].'</p>
                          <p class="card-text">'.$music['release_date'].'</p>
                          <p class="card-text">'.$minute.'m '.$second.'s</p>
                        </div>
                    </div>
                  </div>';
                }
                ?>
        </div>
    </div>
</body>
</html>