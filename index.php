<!DOCTYPE html>
<html>
    <head>
        <title> Your To Do list</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styl.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=The+Girl+Next+Door&display=swap" rel="stylesheet">
        <?php
             $conn = new mysqli("localhost", "root", "", "todo");
             if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit(); 
            }
            if ($_POST["title"] && $_POST["desc"]) {
                $sql = 'INSERT INTO list (title, description) VALUES ("'.$_POST["title"].'","'.$_POST["desc"].'")';
                mysqli_query($conn, $sql);
            }
            $all = 'SELECT * FROM list;';
            $records = mysqli_query($conn, $all);
        ?>
    </head>
    <body>
        <section id="LeftSide">
            <h1>Your to do List</h1>
            <form method="POST">
                <input type="text" name="title" id="title">
                <a id="titleLabel">Title</a><br><br>
                <input type="text" name="desc" id="desc">
                <a id="descLabel">desc</a>
                <button type="submit" id="add">add</button>
            </form>
        </section>
        
        <section id="RightSide">
            <h1>Here are your todo's</h1>
            <table>
                <?php 
                    if ($records->num_rows>0) {
                        while ($row = $records->fetch_assoc()){
                            echo "<td>".$row["title"]."</td><td>".$row["description"]."</td>";
                        }
                    }

                ?>
            </table>
        </section>
    </body>
</html>