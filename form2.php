<?php
include_once 'song.php';
include_once 'db.php';
include_once 'app.php';


if (isset($_GET['id'])){

    $song =Song::find($_GET['id']);

}else{
    $song= new Song();

}

if ($_POST){
    var_dump($_POST);
    $song->name=$_POST['name'];
    $song->description=$_POST['description'];
    $song->link=$_POST['link'];
    $song->date=date('Y-m-d');
    $song->save();
}

$songs = Song::selectAll();

// var_dump($song);

?>



</head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
          <form action="" method="post">

                name<input type="text" name="name" value="<?php echo $song->name ?>">
            description<input type="text" name="description" value="<?php echo $song->description ?>">

            link<input type="text" name="link" value="<?php echo $song->link ?>">
            <!-- genres<select name="genres"> -->
               <!--  <option> Alternative</option>
                <option> Anime</option>
                <option> Blues</option>
                <option> Country</option>
                <option> Dance</option>
                <option> Baby Metal</option>
                <option> Hip hop</option>
            </select> -->

            <button type="submit">Submit </button>

          </form>  

    <!-- <a href="list.php">BACK TO THE LIST</a>         -->

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
        <td><a href='form2.php?id=".$song->id."'>EDIT</a></td><td><a href=\"delete.php?id={$song->id}\">DELETE</a></td></tr>";
    }
    ?>

</table>

<a href="form2.php">ADD A NEW SONG</a>

    </body>
</html>

