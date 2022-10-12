<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("dbConnection.php");
    ?>
    <?php
        $bookName = "".$_POST["bookName"];
        $author = "".$_POST["author"];
        $publisher = "".$_POST["publisher"];
        $year = 0+intval($_POST["year"]);
        $subject = "".$_POST["subject"];
        $ISBN = "".$_POST["ISBN"];
        $review = "".$_POST["review"];
        $linkAmazon = "".$_POST["linkAmazon"];
        $picture = "".$_FILES['image']['tmp_name'];
        $pictureName = "".$_FILES['image']['name'];
        $fixedName = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $pictureName);
        $pathForImage = __DIR__."/Images/".$fixedName;
        if(is_uploaded_file($picture)){
            move_uploaded_file($picture, $pathForImage);
        }
        $query = "INSERT INTO `bookdetail` (`title`, `author`, `publisher`, `publicationYear`, `subject`, `ISBN`, `review`, `amazonLink`, `imageLink`)  
        VALUES ('$bookName', '$author', '$publisher', '$year', '$subject', '$ISBN', '$review', '$linkAmazon', '$fixedName')";
        if(mysqli_query($conn, $query)){
            echo("<p>Data succesfully added to the database!");
        }else{
            echo("Dang it, error ".mysqli_error($conn)." just happened@");
        }
        header("Location: outputDb.php");
    ?>
</body>
</html>