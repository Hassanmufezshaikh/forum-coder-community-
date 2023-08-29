<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Upmyranks -coding forum</title>
</head>
<style>
    #ques {
        min-height: 1000px;
    }
</style>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php require 'partials/_dbconnect.php'; ?>
    <?php
    $showAlert =false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST'){ 
        // insert into comment db
    $id = $_GET['threadid'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) 
    VALUES ('$comment', '$id', '0', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    $showAlert =true;
    if ($showlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> your comment has been successfully updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
             </button>
        </div>';
    }

    }
?>


    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id`='$id'";
    $result = mysqli_query($conn, $sql);
    $noresult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noresult = false;
        $title = $row['thread_title'];
        echo '<div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">' . $title . '</h1>
            
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.
                Warn About Adult Content.
                Do not spam.
                Do Not Bump Posts.
                Do Not Offer to Pay for Help.
                Do Not Offer to Work For Hire.
                Do Not Post About Commercial Products.
                Do Not Create Multiple Accounts (Sockpuppets)
                When creating links to other resources.
            </p>
            <p><b> posted by :anonymous</b> </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    }
    ?>

        <div class="container">
        <h1>Post a Comment</h1>

        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="py-3">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>

    </div>


<div class="container" id="ques">
        <h1 class="py-3"> Discussion </h1>

        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE `thread_id`='$id'";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $thread_user_id = $row['comment_by'];
            $comment_time = $row['comment_time']; 
            echo '<div class="media">
            <img class="mr-3" src="default.png" width="34px" alt="Generic placeholder image">
            <div class="media-body">
            <p class="font-weight-bold my-0">  anonymous at  ' . $comment_time. '</p>
            ' . $content . '
            </div>
            </div>';
        }
        ?>
    </div>

    <?php include 'partials/_footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>