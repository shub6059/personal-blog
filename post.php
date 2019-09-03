<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blog Post</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
</head>

<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <article>
        <div class="container">
            <div class="row">
                <?php $sql = "SELECT posts.id,posts.title,categories.catname,posts.creationdate FROM posts JOIN categories ON categories.id=posts.category ORDER BY posts.id DESC";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                        ?>
                        <div class="col-md-10 col-lg-8">
                            <div class="post-preview">
                                <a href="post-details.php?id=<?php echo htmlentities($result->id); ?>">
                                    <h2 class="post-title"><?php echo htmlentities($result->catname); ?>
                                        , <?php echo htmlentities($result->title); ?></h2>
                                    <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                                </a>
                                <p class="post-meta">Posted by&nbsp;<a href="#">Admin
                                                                                on <?php echo htmlentities($result->creationdate); ?></a>
                                </p>
                            </div>
                            <hr>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </article>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
</body>

</html>