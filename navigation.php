<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
 
        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
 
            <!-- Change "Your Site" to your site name -->
            <a class="navbar-brand" href="<?php echo $home_url; ?>">Teemdy</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- link to the "Cart" page, highlight if current page is cart.php -->
                <?php
            // check if users / customer was logged in
            // if user was logged in, show "Edit Profile", "Orders" and "Logout" options
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
            ?>
                <li <?php echo $page_title=="Главная" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>">Главная</a>
                </li>
                <li <?php echo $page_title=="Создать" ? "class='active'" : ""; ?>>
                    <a href="create">Создать</a>
                </li>
            
            <?php
            }// if user was not logged in, show the "login" and "register" options
            else{
            ?>
                <li <?php echo $page_title=="Главная" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>">Главная</a>
                </li>
            <?php
            }
            ?>
            </ul>
            <?php
            // check if users / customer was logged in
// if user was logged in, show "Edit Profile", "Orders" and "Logout" options
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        &nbsp;&nbsp;<?php echo $_SESSION['name']; ?>
                        &nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $home_url; ?>logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;Выйти</a></li>
                    </ul>
                </li>
            </ul>
            <?php
            }
 
            // if user was not logged in, show the "login" and "register" options
            else{
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $page_title=="Вход" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>login">
                        <span class="glyphicon glyphicon-log-in"></span> Войти
                    </a>
                </li>
             
                <li <?php echo $page_title=="Регистрация" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>register">
                        <span class="glyphicon glyphicon-check"></span> Регистрация
                    </a>
                </li>
            </ul>
            <?php
            }
            ?>
             
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->