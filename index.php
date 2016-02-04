<?php

require 'logs.php';

try {
	$db = new PDO('mysql:host='.$dbHost.';dbname='.$dbName , $user,$pswd);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}
catch(Exception $e){
	var_dump($e);
	die('Could not connect');
}

$req = $db->prepare('SELECT donor, amount, date FROM donation');
$req->execute();

while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

	$totalDonation += $row['amount'];
	$totalDonor += 1;
}
$pourcentageDonation = $totalDonation/10;
$toDoStill = 100 - $pourcentageDonation;

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="stylesheets/bootstrap.min.css">
	<link rel="stylesheet" href="stylesheets/app.css">
</head>
<body>
	<header>
		<ul>
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Pauline & Margaux</a></li>
			<li><a href="#">L'Association</a></li>
			<li><a href="#">Aide</a></li>
			<li><a href="#">F</a></li>
		</ul>
	</header>
	<div class="wrapper">
		<!-- div map -->
		<div id="map"></div>

		<!-- div donation -->
		<div id="donation">
			<h1>Titre du crowdfunding !</h1>
			<h2 class="subtitle">Aidez Pauline et Margaux dans leur trajet vers Marrakesh en participant aux dons pour l'Association "Les Enfants du Désert".</h2>

			<!-- Jauge d'avancement des dons -->
			<div class="level">
				<!-- ici la jauge d'avancement de Pauline et Margaux -->
				<img src="assets/biarritz.png" alt="biarritz" class="biarritz-img">
				<div class="level-background">
					<div class="level-real"></div>
				</div>
				<img src="assets/marrakesh.png" alt="Marrakesh" class="marrakesh-img">
				<p>Il reste à Pauline et Margaux <?php echo $toDoStill;?>% du trajet à accomplir</p>
			</div>

			<!-- Global donations statistics  -->
			<div class="global-donation">
				<div class="row donation-statistics">
					<div class="col-md-6 numbers">
						<!-- total amount donation -->
						<div class="total-donation">
							<div class="amount-donation"><h2><?php echo $totalDonation; ?>€ collectés</h2><span>sur un objectif de 1000€</span></div>
							<div class="amount-percentage">
								<h2><span><?php echo $pourcentageDonation; ?></span>%</h2>
								<span>du trajet effectué</span>
							</div>
						</div>
						<!-- Number of donors and days left -->
						<div class="total-donation-bottom">
							<div class="donor"><h2><?php echo $totalDonor; ?></h2><span>contributeur(s)</span></div>
							<div class="days-left"><h2>7</h2><span>jours restant(s)</span></div>
						</div>
					</div>

					<div class="col-md-6 contribute-button-parent">
						<a href="#" class="contribute-button"><img src="assets/buttons/contribuerAuProjet" alt="Contribution"></a>
					</div>
				</div>
				<div class="make-donation">
					<h1>Faire un don à l'association les enfants du désert</h1>
					<h2>Un montant de </h2>
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

						<!-- Identify your business so that you can collect the payments. -->
						<input type="hidden" name="business"
						value="lucas.martin.ts4-facilitator@gmail.com">

						<!-- Specify a Donate button. -->
						<input type="hidden" name="cmd" value="_donations">

						<!-- Specify details about the contribution -->
						<input type="hidden" name="item_name" value="Association Enfants du Désert">
						<input type="number" name="amount" step="1" value="0" min="0">
						<input type="hidden" name="currency_code" value="EUR">
						<h2>Avancera Pauline et Margaux de <span>0</span>% sur leur trajet</h2>

						<input type="hidden" name="return" value="http://localhost/4Ltrophy/index.php">
						<input type="hidden" name="cancel_return" value="http://localhost/4Ltrophy/index.php">
						<input type="hidden" name="notify_url" value="http://localhost4Ltrophy/ipn.php">


						<!-- Display the payment button. -->
						<input type="image" name="submit" border="0"
						src="assets/donation-button.png"
						alt="PayPal - The safer, easier way to pay online">
						<img alt="" border="0" width="1" height="1"
						src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
					</form>
				</div>
			</div>

			<!-- Days donations statistics -->
			<div class="daily-donations">
				<div class="row day-range">

					<div class="col-sm-4 single-day">
						<div class="visual-icon passed">
							<h3>1</h3>
						</div>
						<div class="content">
							<p>Contributions <span>150€</span></p>
							<p>Avancée <span>15%</span></p>
							<p class="italic">18 contributeurs</p>
						</div>
					</div>

					<div class="col-sm-4 single-day">
						<div class="visual-icon passed">
							<h3>2</h3>
						</div>
						<div class="content">
							<p>Contributions <span>150€</span></p>
							<p>Avancée <span>15%</span></p>
							<p class="italic">18 contributeurs</p>
						</div>
					</div>

					<div class="col-sm-4 single-day">
						<div class="visual-icon active">
							<h3>3</h3>
						</div>
						<div class="content">
							<p>Contributions <span>150€</span></p>
							<p>Avancée <span>15%</span></p>
							<p class="italic">18 contributeurs</p>
						</div>
					</div>
					
				</div>

				<div class="row day-range">

					<div class="col-sm-4 single-day">
						<div class="visual-icon">
							<h3>4</h3>
						</div>
						<div class="content">
							<p>Contributions <span>150€</span></p>
							<p>Avancée <span>15%</span></p>
							<p class="italic">18 contributeurs</p>
						</div>
					</div>

					<div class="col-sm-4 single-day">
						<div class="visual-icon">
							<h3>5</h3>
						</div>
						<div class="content">
							<p>Contributions <span>150€</span></p>
							<p>Avancée <span>15%</span></p>
							<p class="italic">18 contributeurs</p>
						</div>
					</div>

					<div class="col-sm-4 single-day">
						<div class="visual-icon">
							<h3>6</h3>
						</div>
						<div class="content">
							<p>Contributions <span>150€</span></p>
							<p>Avancée <span>15%</span></p>
							<p class="italic">18 contributeurs</p>
						</div>
					</div>
					
				</div>				<div class="row day-range">

				<div class="col-sm-4 single-day">
					<div class="visual-icon">
						<h3>7</h3>
					</div>
					<div class="content">
						<p>Contributions <span>150€</span></p>
						<p>Avancée <span>15%</span></p>
						<p class="italic">18 contributeurs</p>
					</div>
				</div>

				<div class="col-sm-4 single-day">
					<div class="visual-icon">
						<h3>8</h3>
					</div>
					<div class="content">
						<p>Contributions <span>150€</span></p>
						<p>Avancée <span>15%</span></p>
						<p class="italic">18 contributeurs</p>
					</div>
				</div>

				<div class="col-sm-4 single-day">
					<div class="visual-icon">
						<h3>9</h3>
					</div>
					<div class="content">
						<p>Contributions <span>150€</span></p>
						<p>Avancée <span>15%</span></p>
						<p class="italic">18 contributeurs</p>
					</div>
				</div>

			</div>
		</div>



	</div>
</div>



<script src="js/dist/vendor.js"></script>
<script src="js/dist/app.js"></script>
</body>
</html>