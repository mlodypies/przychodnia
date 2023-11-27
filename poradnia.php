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
		<form method="POST" action="pacjent.php">
			<label>Podaj id: <br>
				<input type="number" name="id"></label>
				<input type="submit" value="Pokaż szczegóły">
		</form>
	</nav>
	<main>
		<h2>KARTA PACJENTA</h2>
		<p>Nie wybrano pacjenta</p>
	</main>
	<footer>
		<p>utworzone przez: </p>
		<a href="kwerendy.txt">Kwerendy do pobrania</a>
	</footer>
</body>
</html>