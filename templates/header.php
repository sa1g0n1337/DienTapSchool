<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="spl4yer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ninja school</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <link rel="stylesheet" href="public/fontawesome/css/all.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
    </head>
    <body>
        <header>
            <?php
                 include('session.php');
                ?> 
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="index.php">Ninja school</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?page=home">Homepage <span class="sr-only">(current)</span></a>
                        </li>
                        <?php
                            if($teacher){
                            
                            echo'<li class="nav-item">
                             <a class="nav-link" href="index.php?page=add_notification">Write post</a>
                            </li>';
                            }
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=challenges&action=view">Challenges</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=users">User list</a>
                        </li>
                    </ul>
                    <form class="form-inline mt-2 mt-md-0 " method="get" action="index.php?page=home">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <?php
                        if(isset($login_session)){
                         echo '<a class="nav-item nav-link" href="index.php?page=profile&user='.$login_session.'&action=view">'.$login_session.'</a>';
                        echo '<a class="nav-item nav-link" href="index.php?page=logout">Log out</a>';
                                          
                        } else {
                            echo '<a href="login.php" class="btn btn-success" style="margin-left: 20px;">Login</a>';
                        }
                        ?>
                </div>
            </nav>
        </header>