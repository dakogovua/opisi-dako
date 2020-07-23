<?php
//session_start();



  if($_SESSION["role"] == "admin"){
/* echo "Session is set "; // for testing purposes
 echo ($_SESSION["session_username"]);*/




require_once("./includes/connection.php");
echo ($_SESSION["role"]);
echo "<hr>";

/*define("DB_SERVER", "192.168.0.233");
define("DB_USER", "cataloguser");
define("DB_PASS", "DAKOcatalog23");
define("DB_NAME", "catalogdb");


$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("Cannot select DB");
	mysql_query("SET NAMES utf8");
/*
$date = date("Y-m-d H:i:s");
// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

/*if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} */

$query = mysql_query("SELECT * FROM users");
$numrows=mysql_num_rows($query);

 if($numrows!=0 )

    {
    	echo "<table id='my-table'> <thead><tr><th>id</th><th>Login</th><th>Pass</th><th>Rights</th><th>Fio</th><th>Position</th><th class='tabledit-toolbox-column'></th></tr></thead>";
    while($row=mysql_fetch_assoc($query))
    
    {
    	echo  "<tr><td>".$row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["pass"]. "</td><td>" . $row["rights"]. "</td><td>" . $row["FIO"]. "</td><td>" . $row["position"]. "</td></tr>";
    }
    echo "</table>";
  }
  else {
    echo "0 results";
	}  
}

else {

	header("location: ../login.php");
}

?>

<script>
$(function() {
	 function usersedit() { 
		$('#my-table').Tabledit({
		url: 'userform/useredit.php',
		warningClass: 'warningz',
      					dangerClass: 'danger',
      					mutedClass: 'muted',


		onSuccess: function(data, textStatus, jqXHR) {
									console.log('onSuccess(data, textStatus, jqXHR)');
									console.log (data);
									//location.reload();
								},
		onFail: function(jqXHR, textStatus, errorThrown) {
      						console.log('onFail(jqXHR, textStatus, errorThrown)');
      					},

		columns: {
			identifier: [0, 'id'],
			editable: [[1, 'login'], [2, 'pass'], [3, 'rights', '{"admin": "Администратор", "editor": "Работник архива", "guest": "Посетитель"}'], [4, 'FIO'], [5, 'position']]
		},
		

		editButton: true,
		deleteButton: true,
		saveButton: true,
		restoreButton: false,
		buttons: {
			edit: {
				class: 'btn btn-sm btn-default',
				html: '<span class="glyphicon glyphicon-pencil">edit</span>',
				action: 'edit'
			},
			delete: {
				class: 'btn btn-sm btn-default',
				html: '<span class="glyphicon glyphicon-trash">delete</span>',
				action: 'delete'
			},
			save: {
				class: 'btn btn-sm btn-success',
				html: 'Save'
			},
			confirm: {
				class: 'btn btn-sm btn-danger',
				html: 'Confirm'
				}
			}
		});
	 }
	 
	 $("#usersedit").click(function() {
				console.log("this.value " + this.value);
				usersedit();
				this.disabled=true;
		//if ( $('#my-table').length && role == "admin") usersedit(); // Проверяем и запускаем редактор
		});
	});
</script>
<div class="container" style="width: 100%;text-align: center;">

<button id="usersedit" type="button" class="btn btn-primary" style="width: 130px; margin: 10px auto">редактировать</button>
</div>

<div class="container">
	<div class="row">
		<form method="post" action="userform/newuser.php" class="form-users col-sm-6 col-sm-offset-3">
			<h2>Добавить Нового пользователя</h2>
			<div class="form-group">
				<label for="firstName" class="col-sm-3 control-label">Логин</label>
				<div class="col-sm-9">
					<input type="text" name="login" placeholder="Логин должен быть на Английском" class="form-control" required pattern="^[a-zA-Z]+$">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Пароль</label>
				<div class="col-sm-9">
					<input type="password" name="pass" placeholder="Пароль" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label for="right" class="col-sm-3 control-label">Права доступа</label>
				<div class="col-sm-9">
					<select class="form-control" name="rights" required>
						<option  value="admin">Администратор</option>
						<option  value="editor" selected>Работник архива</option>
						<option  value="guest">Посетитель</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="firstName" class="col-sm-3 control-label">Ф.И.О.</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Ф.И.О" name="FIO" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label for="firstName" class="col-sm-3 control-label">Должность</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Должность" name="position" class="form-control" required>
				</div>
			</div> <!-- /.form-group -->
			<div class="form-group">
				<div class="but-form-users">
					<button type="submit" class="btn btn-primary btn-block">Ввести</button>
				</div>
			</div>
		</form> <!-- /form -->
	</div><!-- row -->
</div> <!-- ./container -->