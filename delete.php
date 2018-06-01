<?php
include_once 'song.php';
include_once 'db.php';
include_once 'app.php';

$song = Song::find($_GET['id']);
$song->delete();

    header("location:form2.php");