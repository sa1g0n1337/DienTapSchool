<?php
    include_once('templates/header.php');
    ?>
<div class="jumbotron">
    <div class="container">
        <div id="postlist">
            <?php
                // include('config.php');
                // session_start();
                   if(isset($_GET['search']) && !empty($_GET['search'])){
                     $search = $_GET['search'];
                     $query = "SELECT * FROM notifications WHERE title like '%$search%' ORDER BY id DESC;";
                       $result = mysqli_query($db,$query);
                
                       if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()) {
                
                         echo '<div class="panel" style="border-bottom: 1px solid black; margin: 16px">
                   <div class="panel-heading">
                      <div class="text-center">
                         <div class="row">
                            <div class="col-sm-9">
                               <a href="index.php?page=notification&id='.$row['id'].'&action=view"><h3 class="pull-left">'.$row['title'].'</h3></a>
                            </div>
                            <div class="col-sm-3">
                               <h4 class="pull-right">
                                  <small><em>'.$row['date'].'</em></small>
                               </h4>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="panel-body" style="margin: 24px">
                      '.$row['content'].'<br>
                   </div>
                   
                </div>';
                       }
                     } else {
                        echo "Can not find post: " . $search;
                     }
                   } else {
                      $query = "SELECT * FROM notifications ORDER BY id DESC;";
                      $result = mysqli_query($db,$query);
                  
                   if ($result != NULL && $result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                         echo '<div class="panel" style="border-bottom: 1px solid black; margin: 16px">
                   <div class="panel-heading">
                      <div class="text-center">
                         <div class="row">
                            <div class="col-sm-9">
                               <a href="index.php?page=notification&id='.$row['id'].'&action=view"><h3 class="pull-left">'.$row['title'].'</h3></a>
                            </div>
                            <div class="col-sm-3">
                               <h4 class="pull-right">
                                  <small><em>'.$row['date'].'</em></small>
                               </h4>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="panel-body" style="margin: 24px">
                      '.$row['content'].'<br>
                   </div>
                   
                </div>';
                       }
                   } else {
                     echo "No post!";
                   }
                  }
                  
                  ?>
        </div>
    </div>
</div>
<?php 
    // include_once('templates/footer.php');
    ?>
<!-- guest/guest -->
</body>
</html>