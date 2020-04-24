<html>
<head>
    <title>Pagination</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 2;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn = new PDO('mysql:host=localhost;dbname=pfe','root','root');
        // Check connection
        

        $total_pages_sql = "SELECT id FROM livre";
        $result = $conn->query($total_pages_sql);
        $total_rows = $result->rowCount();
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM livre LIMIT $offset, $no_of_records_per_page";
        $res_data = $conn->query($sql);
        while($row = $res_data->fetch()){
           echo $row['id'].'<br>';
           echo $row['titre'].'<br>';
           echo $row['content'].'<br>';
        }

        
    ?>
    <ul class="pagination">
        <li><a href="grammar.php?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "grammar.php?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "grammar.php?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="grammar.php?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>
</html>


