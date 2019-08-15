<?php
// Include config file
include_once "config/core.php";
 include_once "objects/user.php";
 include_once "objects/item.php";
 include_once "config/database.php";
$page_title="Создать";
$require_login=true;
include_once "login_checker.php";
 
// include page header HTML
include_once 'layout_head.php';
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($_POST){
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $item = new Item($db);
 
    // set values to object properties
    $item->date=$_POST['date'];
    $item->number=$_POST['number'];
    $item->text1=$_POST['text1'];
    $item->text2=$_POST['text2'];
 
// create the user
if($item->create()){
 
    echo "<div class='alert alert-info'>";
        echo "Successfully created.";
    echo "</div>";
 
    // empty posted values
    $_POST=array();
    header("Location: {$home_url}");
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to create.</div>";
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создать запись</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Создать запись</h2>
                    </div>
                    <p>Пожалуйста введите данные которые будут хранятся в базе данных.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Дата</label>
                            <input type="date" name="date" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Текст 1</label>
                            <textarea name="text1" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Текст 2</label>
                            <textarea name="text2" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Возрост</label>
                            <input type="text" name="number" class="form-control" value="">
                            <span class="help-block"></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Создать">
                        <a href="index" class="btn btn-danger">Отмена</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <?php 
        // footer HTML and JavaScript codes
        include 'layout_foot.php';
    ?>
</body>
</html>