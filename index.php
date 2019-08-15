<?php
// core configuration
include_once "config/core.php";
 include_once("objects/item.php");
 include_once "config/database.php";
$database = new Database();
$db = $database->getConnection();
$item = new Item($db);
$data = $item->show($from_record_num, $records_per_page);

$page_url="index.php?";
// set page title
$page_title="Главная";

// include login checker
$require_login=true;
include_once "login_checker.php";
 
// include page header HTML
include_once 'layout_head.php';

echo "<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    if($action=='login_success' && !empty($_SESSION['name'])){
        echo "<div class='alert alert-info'>";
            echo "<strong>Привет " . $_SESSION['name'] . ", с возвращением!</strong>";
        echo "</div>";
    }
 
    // if user is already logged in, shown when user tries to access the login page
    else if($action=='already_logged_in' ){
        echo "<div class='alert alert-info'>";
            echo "<strong>Вы уже вошли в систему.</strong>";
        echo "</div>";
    }
 
    if($item->show($from_record_num, $records_per_page)){
        $num = $data->rowCount();
        echo "<div class=''>";
        if($num>0){
            echo "<table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <th>Пользователь</th>
                        <th>Дата</th>
                        <th>Возрост</th>
                        <th>Текст 1</th>
                        <th>Текст 2</th>
                        
                    </tr>";
                    
                        while ($row = $data->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        echo "<tr>";
                            echo "<td>{$name}</td>";
                            echo "<td>{$date}</td>";
                            echo "<td>{$number}</td>";
                            echo "<td>{$text1}</td>";
                            echo "<td>{$text2}</td>";
                            
                        echo "</tr>";
                        }
        

            echo "</table>";
            $page_url="index.php?";
            $total_rows = $item->counter();
            if($total_rows>5){
                include_once 'paging.php';
            }
        }else{
            echo "<center><h3>Нету строк соответствующих вашему аккаунту. </h></center>";
            $total_rows = 0;
        }
 
    // actual paging buttons
    
        echo "</div>";
    }
echo "</div>";
 
// footer HTML and JavaScript codes
include 'layout_foot.php';
?>
