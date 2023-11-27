<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="poradnia.css">
	<title>Poradnia</title>
</head>
<body>
	<header>
		<h1>PORADNIA SPECJALISTYCZNA</h1>
	</header>
	<nav>
		<h3>LEKARZE SPECJALIŚCI</h3>
		<table>
			<tr>
				<th colspan="2">Poniedziałek</th>
			</tr>
			<tr>
				<th>Anna Kowalska</th><th>otolaryngolog</th>
			</tr>
			<tr>
				<th colspan="2">Wtorek</th>
			</tr>
			<tr>
				<th>Jan Nowak</th><th>kardiolog</th>
			</tr>
		</table>
		<h3>LISTA PACJENTÓW</h3>
		<?php 
			$connect = mysqli_connect('localhost','root','','poradnia');
			$ask = "SELECT id, imie, nazwisko, choroba FROM `pacjenci`";
			$result = mysqli_query($connect,$ask);
			while ($line=mysqli_fetch_row($result))
			{
				echo $line[0].' '.$line[1].' '.$line
				[2].' '.$line[3].'<br>';
			}

			mysqli_close($connect);
		?>
		<br><br>
		<form method="post" action="pacjent.php">
			<label>Podaj id: <br>
				<input type="number" name="id"></label>
				<input type="submit" value="Pokaż szczegóły">
		</form>
	</nav>
	<main>
		<h2>KARTA PACJENTA</h2>
		<?php
			$id = $_POST['id'];
			$connect = mysqli_connect('localhost','root','','poradnia');
			$ask1 = "SELECT imie, nazwisko, leki_przepisane, opis FROM `pacjenci` WHERE id = '$id'";
			$result1 = mysqli_query($connect,$ask1);
			while ($line1=mysqli_fetch_row($result1))
			{
				echo '<p>Imię i Nazwisko: '.$line1[0].' '.$line1[1].'</p>'.'<p>Przepisane leki: '.$line1
				[2].'</p>'.'<p>Opis choroby: '.$line1[3].'</p>';
			}

			mysqli_close($connect);
		?>
	</main>
	<footer>
		<p>utworzone przez: 21 </p>
		<a href="kwerendy.txt">Kwerendy do pobrania</a>
	</footer>
</body>
</html>