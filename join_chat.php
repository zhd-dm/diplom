<!DOCTYPE html>
<html lang="ru">
<head>
	<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="css/join_chat.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 

</head>
<body>
	<div class="header">
		<!-- <p> Привет, <?=$_COOKIE['user']?>! </p> -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="index.php"> zhdtor </a>
			<?php
			if ($_COOKIE['user'] == "Администратор") {
				echo '<form action="admin_panel.php" method="post">';
				echo	'<button class="btn btn-light" type="submit"> Admin </button>';
				echo '</form>';
			}
			?>
			<form action="monitor.php" method="post">
				<button class="btn btn-light" type="submit"> Мониторинг </button>
			</form>
			<form action="join_chat.php" method="post">
				<button class="btn btn-light" type="submit"> Чат </button>
			</form>
<?php if ($_COOKIE['user'] != "Администратор") { ?>
			<form action="settings.php" method="post">
				<button class="btn btn-light" type="submit"> Настройки </button>
			</form>
<?php } ?>
			<form action="exit.php" method="post">
				<button class="btn btn-light" type="submit"> Выход </button>
			</form>
		</nav>
	</div>
	<br>
	<br>
	<div class="dropdown">
		<div class="row">
			<div class="col-1">
			</div>
			<div class="col-8">
				<h1 class="display-4"> <?=$_COOKIE['user']?>, добро пожаловать в чат! </h1>
			</div>
			<div class="col-1">
			</div>
		</div>
		<div class="row">
			<div class="col-1">
			</div>
  			<div class="col-4">
  				<div class="input-group">
  					<div class="input-group-prepend">
    					<span class="input-group-text">Тело чата</span>
  					</div>
  					<textarea class="form-control" aria-label="With textarea" rows="15">
  					<?php 
  						$host = 'localhost';  
  						$user = 'root';    
  						$pass = 'root'; 
  						$db_name = 'diplom_chat';
  						$mysql = mysqli_connect($host, $user, $pass, $db_name);
  						$query_name = "SELECT `login` FROM `username` WHERE `name` = '{$_COOKIE['user']}'";
						$query = "SELECT * FROM `{$_COOKIE['user']}` GROUP BY `id`";
						$result = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));
						echo "\n";
  						while ($row = mysqli_fetch_row($result)) {
							echo "$row[1] - $row[2] \n";

						}
					?>
  					</textarea>
				</div>
  			</div>
  			<div class="col-1">
  			</div>
		</div>
		<br>
		<div class="chat-box">
			<div class="row">
				<div class="col-1">
				</div>
				<div class="col-4">
					<form action="chat.php" method="post">
						<input type="text" class="form-control" placeholder="Введите сообщение" name="text">
						<br>
						<div class="button-submit">
			    			<button class="btn btn-success" type="submit">Отправить</button>
			 			</div>
			 		</form>
	 			</div>
				<div class="col-1">
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-1">
		</div>
		<div class="col-4">
			<form action="logged.php" method="post">
				<button class="btn btn-outline-danger" type="submit"> Назад </button>
			</form>	
		</div>
		<div class="col-1">
		</div>
	</div>
</body>


</body>
</html>