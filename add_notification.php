<?php 
    include_once('templates/header.php');
    if(!$teacher){
        header('location: index.php');
    }
    
    if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content'])){
     $title = $_POST['title'];
     $content = $_POST['content'];
     $author= $_SESSION["user"];
     $sql = "INSERT INTO `notifications`(`title`, `content`, `author`) VALUES ('$title','$content','$author')";
     
     
    if (mysqli_query($db, $sql)) {
    header('location: index.php');
    } else {
    echo "<script>alert('Error');</script>";
    }
    }
    ?>
<div class="jumbotron container">
    <div class="row">
        <div class="container-fluid bg-light py-3" style="padding:15px;">
            <form name="article-form" method="post" action="index.php?page=add" role="form">
                <div class="messages"></div>
                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_name">Title *</label>
                                <input id="form_name" type="text" name="title" class="form-control" placeholder="Write title..." required="required" data-error="name is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Content *</label>
                            <textarea id="form_message" name="content" class="form-control" placeholder="Write content..." rows="4" required="required" data-error="send a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-warning btn-send" value=" Send ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
