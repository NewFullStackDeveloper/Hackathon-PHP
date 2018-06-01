<?php
include_once 'song.php';
include_once 'db.php';
include_once 'app.php';

$songs = Song::selectAll();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<h1>list of songs</h1>

<table border="1px">
    <tr>
        <th>Name of a song</th>
        <th>Description</th>
        <th>Link</th>
    </tr>
    
    <?php
    foreach($songs as $song){
        echo "<tr><td>".$song->name."</td><td>".$song->description."</td><td>".$song->link."</td>
        <td><a href='form.php?id=".$song->id."'>EDIT</a></td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php

