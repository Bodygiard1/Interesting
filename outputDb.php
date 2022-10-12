<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Document</title>
</head>
<body>
    <?php
        include("dbConnection.php");
    ?>
    <?php
        $sql = "SELECT * FROM `bookdetail`;";
        $response = mysqli_query($conn, $sql);
        if(mysqli_num_rows($response)>0){
            ?>
                <table id = "table">
                    <tr>
                        <th>Book ID</th><th>Book Title</th><th>Author</th><th>Publisher</th><th>Publication Year</th><th>Subject</th><th>ISBN</th><th>review</th><th>Link to Amazon</th><th>Image</th>
                    </tr>
                    <?php
                          while($row = mysqli_fetch_assoc($response)){
                            ?>
                    <tr>
                        <td><?php echo $row['bookID']?></td>
                        <td><?php echo $row['title']?></td>
                        <td><?php echo $row['author']?></td>
                        <td><?php echo $row['publisher']?></td>
                        <td><?php if(!$row['publicationYear'] == 0){echo $row['publicationYear'];}?></td>
                        <td><?php echo $row['subject']?></td>
                        <td><?php echo $row['ISBN']?></td>
                        <td><?php echo $row['review']?></td>
                        <td><a href = "<?php echo $row['amazonLink']?>">Link to Amazon page</a></td>
                        <td><a href = "images/<?php echo $row['imageLink']?>"><img src="images/<?php echo $row['imageLink']?>"></a></td>
                        <td><a href = "outputDb.php?f=deleteConfirmation&<?php echo $row['bookID']?>&<?php echo $row['title']?>&<?php echo $row['imageLink']?>"><img src=resources/delete.png></a></td>
                    </tr>
                    <?php } ?>
                </table>

        <?php
            }
            if(isset($_GET['f'])){
                if(function_exists($_GET['f'])) {
                    $_GET['f']();
                }
            }
            if (isset($_GET['takeover'])) {
                if ($_GET['takeover'] == "true") {
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "DELETE FROM bookdetail WHERE `bookdetail`.`bookID` = $id";
                        if(mysqli_query($conn, $query)){
                            $imageLink = $_GET['imgLink'];
                            unlink("Images/".$imageLink);
                            header("Location: outputDb.php?f");
                        }else{
                            echo("Dang it, error ".mysqli_error($conn)." just happened@");
                        }
                    }
                } else {
                    header("Location: outputDb.php?f");
                }
            }
            function deleteConfirmation(){
                echo(
                '<script>
                    let currentUrl = location.href;
                    let id = currentUrl.split("&");
                    let tableInfo = document.getElementById("table");
                    tableInfo.parentNode.removeChild(tableInfo);
                    const takeover = confirm("Are you sure you want to delete ".concat(decodeURIComponent(id[2].replace(/\+/g,  " "))).concat("?"));
                    location.href = "outputDb.php?takeover=".concat(takeover).concat("&id=").concat(id[1]).concat("&imgLink=").concat(id[3]);
                </script>

                '
                
                );
                
            }
        ?>        
</body>
</html>