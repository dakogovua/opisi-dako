<?php

session_start();
if(isset($_SESSION["session_username"])){
/* echo "Session is set "; // for testing purposes
 echo ($_SESSION["session_username"]);*/

 header("location: index.php");

}

 require_once("includes/connection.php"); 




if(isset($_POST["login"])){
	


if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];

	
	$username = mysql_real_escape_string($username);
    
	$password = md5($_POST['password']);
	


    $query =mysql_query("SELECT * FROM users WHERE login='".$username."' AND pass='".$password."'");
		
    $numrows=mysql_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysql_fetch_assoc($query))
    {
    $dbusername=$row['login'];
    $dbpassword=$row['pass'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {


    $_SESSION['session_username']=$username;
    

/////////////////////////////////////////////////////////////////////////////////////////////////

    $queryrole = mysql_query("SELECT rights FROM users WHERE login='".$username."' AND pass='".$password."'");
    $rowrolestatus = mysql_fetch_row($queryrole);
    $_SESSION['role'] = $rowrolestatus[0];

	$_SESSION['session_db'] = mysql_real_escape_string($_POST['db']);

////////////////////////////////////////////////////////
    /* Redirect browser */
    header('location: index.php');
    }
    } else {

 $message =  "Ой, что-то нет такого имени пользователя или пароля!";
    }

} else {
    $message = "Не все поля введены!";
}
}
?>



<div class="container myinstruc">
  <h2>Каталог Архива</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Войти</button>
  <h3><strong>Інструкція для користування електронним каталогом</strong></h3>
  <div class="row">
  	<div class="col-md-4">
  		<h4><strong>[Загальні відомості]</strong></h4>
  		<p><strong>Шановні користувачі</strong>, до Вашої уваги пропонується <em style="color: #4F81BD;">«Електронний географічний каталог Державного архіву Київської області періоду  до  1917 року»</em>, який містить 17 тисяч 890 каталожних карток. Інформація представлена в   11-ти елементах описання (полях), за якими при роботі з каталогом Ви можете здійснювати пошук потрібної Вам інформації.<br><strong>Елементи описання:</strong><br><em>№ запису, рубрика географічного об’єкту (губернія), підрубрика об’єкту (повіт та волость), назва населеного пункту, назва документу,  дата документа, № фонду, назва фонду, № опису,  № справи,  № аркуша(ів).</em>
</p>
  	</div>
  	<div class="col-md-4">
  		<h4 style="color: #C0504D;"><strong>[Правила користування]</strong></h4>
  		<p style="color: #C0504D">У верхньому правому куті, над рубриками, знаходиться   поле <em><u>«пошук»</u></em>, яке  виявляє та виводить на екран заданий Вами запит за <u>ключовим словом</u>.<br><strong><em>Наприклад:</em></strong><em>  якщо Вам потрібна інформація за певний період часу - вводите в поле потрібний рік, якщо шукаєте відповідний населений пункт – вводите населений пункт, якщо бажаєте відшукати потрібний документ – вводите назву  документу, при необхідності пошуку тільки по одному фонду – вписуєте назву фонду тощо, далі з’являється інформація за Вашим запитом (пошук можна здійснювати за всіма рубриками).</em></p>
  	</div>
  	<div class="col-md-4">
  		<h4><strong>[Додаткові можливості]</strong></h4>
  		<p>Під час користування каталогом, у Вас є <strong><em>можливість  роздрукувати каталожну картку.</em></strong><br>Для <em>цього треба двічі натиснути правою клавішею миші в будь-якому полі картки</em>. Після появи <em>«нового вікна»</em> з написом <em>«роздрукувати картку»</em>, інформацію можна виводити на друк.<br>Переглянувши електронний каталог та знайшовши потрібну інформацію за  №  фонду, №  опису та №  справи, <strong><em>Ви можете замовити справу</em></strong> в читальному залі Державного архіву Київської області, який знаходиться за адресою: вул. Ю. Іллєнка, 38 м. Київ.
</p>
  	</div>
  </div>
  <h3><strong>Приємного та зручного користування!</strong></h3>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Введите логин и пароль</h4>
        </div>
        <div class="modal-body">
       <div id="login">
    <h1>AUTOLOGIN in <span id="kcout"></span> sec.</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="username">Username<br />
        <input type="text" name="username" id="username" class="input" value="guest" size="30" /></label>
    </p>
    <p>
        <label for="user_pass">Password<br />
        <input type="password" name="password" id="password" class="input" value="guest" size="30" /></label>
    </p>
	
	<p>
        
		<label for="user_db">Таблица<br />
			<select name="db">
				<option value="kartochki">До 1917</option>
			</select>
		</label>
		
    </p>
	
	
    <p class="submit">
        <input type="submit" name="login" class="button" value="Войти" id='loginbtn'/>
    </p>
       
</form>

    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div> Для начала работы введите <b> логин: </b> guest и <b> пароль: </b> guest  </div>

</div>




<?php include("includes/header.php"); ?>
 



    <div class="container mlogin">
           

    </div>
	
	
	<?php include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "Да ладно: ". $message . "</p>";} ?>