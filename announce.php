<?php
require 'side.php';
echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="/assets/css/announce-style.css">
    <style>
        .announce-card .edit-btn,
        .announce-card .delete-btn {
            max-width: 100%;
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .announce-card .edit-btn {
            background-color: #4CAF50; /* Green */
        }

        .announce-card .delete-btn {
            background-color: #f44336; /* Red */
        }

        .announce-card .edit-btn:hover,
        .announce-card .delete-btn:hover {
            opacity: 0.6;
        }
    </style>
</head>
<body>';
$select="SELECT * FROM announcement";
$select_query=mysqli_query($conn,$select);
if(mysqli_num_rows($select_query)>0){
    while($row=mysqli_fetch_assoc($select_query)){
    echo'<div class="announce-body">
        <div class="announce-card">
            <img src="images/'.$row['file'].'" alt="empops Logo">
            <h3>
                '.$row['title'].'
            </h3>
            <hr>
            <p>
             '.$row['content'].'
            </p>
            <form method="post" action="process.php">
            <input type ="hidden" name="title" value="'.$row['title'].'">
            <button type="submit" name="delete" class="delete-btn">Delete</button></form>
        </div>
    </div>';
    }}
echo'</body>

</html>';
?>