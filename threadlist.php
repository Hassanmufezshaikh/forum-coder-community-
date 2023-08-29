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
        min-height: 450px;


    }
</style>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php require 'partials/_dbconnect.php'; ?>

    <?php
    
    $showAlert =false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST'){ 
        //insert threads db
    $id = $_GET['catid'];
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) 
        VALUES ( '$th_title', '$th_desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    $showAlert =true;
    if ($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> your thread has been sucessfully updated and wait for community to respond you.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
             </button>
        </div>';
    }

    }
?>


    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `categorie_id`='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['categorie_name'];
        $catdesc = $row['categorie_description'];

        echo '<div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to ' . $catname . ' Forums</h1>
            <p class="lead">' . $catdesc . '</p>
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
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    }

    ?>

    <!-- questions part start from here so iam commeting it out to known i see the code -->

    <div class="container">
        <h1> Ask questions</h1>

        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    placeholder="">
                <small id="emailHelp" class="form-text text-muted">Keep it short and crisp as possible.</small>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>

    </div>

    <div class="container" id="ques">
        <h1> browse questions</h1>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];

            echo '<div class="media">
  <img class="mr-3" src="default.png" width="34px" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
    ' . $desc . '
  </div>
</div>';
        }

        // echo var_dump($noresult);
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Threads Found</p>
      <p class="lead">Be the first one to ask questions.</p>
    </div>
  </div>';

        }
        ?>
    </div>

    <?php include 'partials/_footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>