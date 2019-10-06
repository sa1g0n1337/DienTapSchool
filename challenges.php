<?php
    include_once('templates/header.php');
    ?>
<div class="jumbotron">
    <div class="container">
        <div class="row">
        <div class="panel panel-default user_panel">
            <div class="panel-heading">
                <h3 class="float-left">Challenge List</h3>
                <a class="btn btn-success float-right" href="index.php?page=add_challenge">Add</a>
            </div>
            <div class="panel-body">
        <div class="table-container">
                    <table class="table-users table" border="0">
                        <tbody>
                            <?php
                
                      $query = "SELECT * FROM challenges ORDER BY start_date DESC";
                      $result = mysqli_query($db,$query);
                      
                  
                   if ($result != NULL && $result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                      
                            echo '<tr href="#">
                                <td width="10" align="center">
                                    <i class="fas fa-book"></i>
                                </td>
                                <td>
                                     <a href="'.$row['link'].'">'.$row['name'].'</a><br>
                                </td>
                                <td>
                                    '.$row['teacher'].'
                                </td>
                                <td align="center">
                                    '.$row['start_date'].'
                                </td>
                                <td align="center">
                                    '.$row['duration'].' days
                                </td>
                                <td align="center"><a href="index.php?page=upload&challenge='.str_replace(" ","_",$row['name']).'">Upload</a>
                                    
                                </td>
                            </tr>';
                          }
                        }
                          ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

  </div>

        </div>
    </div>

<?php 
    // include_once('templates/footer.php');
    ?>

</body>
</html>