<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./Controllers/Content.php" method="POST">
        <input type="text" name="title">
        <input type="submit" name="submit" value="submit">
    </form>


    <form action="./Controllers/Insert.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Enter title">
    <input type="file" name="pdfFile">
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>