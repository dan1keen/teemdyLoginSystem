<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Регистрация";
 
// include login checker
include_once "login_checker.php";
 
// include classes
include_once 'config/database.php';
include_once 'objects/user.php';
include_once "libs/utils.php";
 
// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-md-12'>";
 
// if form was posted
if($_POST){
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $user = new User($db);
    $utils = new Utils();
 
    // set user email to detect if it already exists
    $user->email=$_POST['email'];
 
    // check if email already exists
    if($user->emailExists()){
        echo "<div class='alert alert-danger'>";
            echo "Введенный вами Email уже зарегистрирован. Пожалуйста, введите правильный Email или <a href='{$home_url}login'>войдите в свой аккаунт.</a>";
        echo "</div>";
    }
 
    else{
        // set values to object properties
		$user->name=$_POST['name'];
		$user->email=$_POST['email'];
		$user->password=$_POST['password'];
		$user->access_level='Customer';
		$user->status=1;
		$user->access_code="";
		 
		// create the user
		if($user->create()){
		 
		    echo "<div class='alert alert-info'>";
		        echo "Вы успешно зарегистрировались. <a href='{$home_url}login'>Пожалуйста, авторизуйтесь!</a>.";
		    echo "</div>";
		 
		    // empty posted values
		    $_POST=array();
		 
		}else{
		    echo "<div class='alert alert-danger' role='alert'>Не удалось зарегистрироваться. Попоробуйте еще раз.</div>";
		}
	}
}
?>
<form action='register.php' method='post' id='register'>
 
    <table class='table table-responsive'>
 
        <tr>
            <td class='width-30-percent'>Имя</td>
            <td><input type='text' name='name' class='form-control' required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td>Пароль</td>
            <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Регистрация
                </button>
            </td>
        </tr>
 
    </table>
</form>
<?php
 
echo "</div>";
 
// include page footer HTML
include_once "layout_foot.php";
?>