<?php 
    include_once('templates/header.php');
    if(!$teacher){
        header('location: index.php');
    }
    
    if(isset($_POST["submit"])){
     $name = $_POST['name'];
     $link = 'uploads/'.str_replace(" ","_",$name);
     $duration = $_POST['duration'];
     $author = $_SESSION["user"];
     if (!file_exists($link)) {
        mkdir($link, 0777, true);  //create directory if not exist
    }
    
     $target_file = $link.'/'. basename($_FILES['fileToUpload']['name']);

     if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO `challenges`(`name`, `link`, `duration`, `teacher`) VALUES ('$name','$link', $duration,'$author')";
    } else {
        echo $_FILES['fileToUpload']['tmp_name'];
        echo "Sorry, there was an error uploading your file.";
    }

    
    if (mysqli_query($db, $sql)) {
    header('location: index.php?page=challenges');
    } else {
        
    echo "<script>alert('error');</script>";
    }
    } else {
    
    }
    ?>
<div class="jumbotron container">
    <div class="row">
        <div class="container-fluid bg-light py-3" style="padding:15px;">
            <form name="article-form" method="post" action="" role="form" enctype="multipart/form-data">
                <div class="messages"></div>
                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_name">Name</label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Name of homework" required="required" data-error="name is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_name">File question</label><br>
                                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required="required">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Duration </label>
                            <input id="form_message" name="duration" class="form-control" placeholder="Write content..." rows="4" required="required" data-error="send a message."></input>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="submit" class="btn btn-warning btn-send" value=" Send ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
