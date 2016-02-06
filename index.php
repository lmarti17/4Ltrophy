<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'logs.php';

$totalDonor = 0;
$totalDonation = 0;


try {
	$db = new PDO('mysql:host='.$dbHost.';dbname='.$dbName , $user,$pswd);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}
catch(Exception $e){
	var_dump($e);
	die('Could not connect');
}

$listResult = [];
$req = $db->prepare('SELECT donor, amount, date FROM donation');
$req->execute();

while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

	$totalDonation += $row['amount'];
	$totalDonor += 1;

	array_push($listResult, [$row['donor'],$row['amount'],$row['date']]);

}
require 'variables.php';
function bestOf($array){
	
	foreach ($array as $key) {

		switch (dateInterval($key[2])) {
			case 0:
			$GLOBALS['totalDonor0'] += 1;
			$GLOBALS['totalAmount0'] += $key[1];
			break;

			case 1:
			$GLOBALS['totalDonor1'] += 1;
			$GLOBALS['totalAmount1'] += $key[1];
			break;

			case 2:
			$GLOBALS['totalDonor2'] += 1;
			$GLOBALS['totalAmount2'] += $key[1];
			break;

			case 3:
			$GLOBALS['totalDonor3'] += 1;
			$GLOBALS['totalAmount3'] += $key[1];
			break;

			case 4:
			$GLOBALS['totalDonor4'] += 1;
			$GLOBALS['totalAmount4'] += $key[1];
			break;

			case 5:
			$GLOBALS['totalDonor5'] += 1;
			$GLOBALS['totalAmount5'] += $key[1];
			break;

			case 6:
			$GLOBALS['totalDonor6'] += 1;
			$GLOBALS['totalAmount6'] += $key[1];
			break;

			case 7:
			$GLOBALS['totalDonor7'] += 1;
			$GLOBALS['totalAmount7'] += $key[1];
			break;

			case 8:
			$GLOBALS['totalDonor8'] += 1;
			$GLOBALS['totalAmount8'] += $key[1];
			break;
			
			default:
				# code...
			break;
		}
	}

}

function dateInterval($date) {

	$datetime1 = date_create($date);
	$datetime2 = date_create('2016-02-10');
	$interval = date_diff($datetime1, $datetime2);
	return $interval->format('%a');
}

function percentageDonation($amount){

	return ($amount/10);
}

bestOf($listResult);

$pourcentageDonation = $totalDonation/10;
$toDoStill = 100 - $pourcentageDonation;
$totatDonationDay = 0;
$totalDonorDay = 0;

?>

<?php require 'header.php' ?>
<div class="wrapper">
	<!-- div map -->
	<div id="map">
		<svg class="svg" viewBox="0 0 661.52 716.73"><defs><style>.cls-14,.cls-15{fill:none;}.cls-14{isolation:isolate;}.cls-15{stroke:#fff;stroke-miterlimit:10;stroke-width:6px;}.cls-1{fill:#ff7364;}.cls-2{fill:#ff654f;}.cls-3{fill:#6a6a6a;}.cls-4{fill:#a2aab1;}.cls-5{fill:#6a818e;}.cls-6{fill:#cfecff;}.cls-7{fill:none;stroke:#ba4758;stroke-miterlimit:10;}.cls-8{fill:#f7edd0;}.cls-9{fill:#e2d6b7;}.cls-10{fill:#777;}.cls-11{fill:#f4f4f4;}.cls-12{fill:#fff;}.cls-13{fill:#353535;}</style>

	</defs><title>Trajet</title><path class="cls-14"/><path class="cls-15" d="M76.33,49.71C197.67,163.71,539-105.62,583,56.38,635.67,250.31,3,221.57,3,414.38,3,533.71,187.67,561,287.67,501.71c214-127,396-22.67,368,214.67" id="theMotionPath"/>
	<!-- Car svg path  -->

	<path class="cls-1" d="M0,63.47C0,61.69,14,25.24,22.77,8.4A15.64,15.64,0,0,1,36.64,0C53.21,0,86.89,0,99.42,0a15.61,15.61,0,0,1,11.7,5.31l11.5,14s9.81,12.24,13.49,12.77c11.36,1.62,17.49,1.59,31.19,3.83,17,2.78,17.47,22.27,17.47,28.2s-1.57,10.66-4.19,10.66h-1.06a15.5,15.5,0,0,1-14.84-10.77c-2.4-7.69-9.32-14.56-20.61-14.56-10.67,0-16.65,6.93-18.95,14.16-2.1,6.57,0,11.18-6.88,11.18h-45A15.44,15.44,0,0,1,58.48,64.32C55.78,56,47.9,49.49,39,49.49S21.3,55.89,18.6,64.29c-2,6.34-3.1,10.53-9.76,10.53H4.9C-0.34,74.82,0,67.49,0,63.47Z"/><path class="cls-2" d="M6.45,45.7C2.75,55.33,0,62.61,0,63.47c0,4-.35,11.36,4.89,11.36H18.6C14.4,61.9,26.63,49.49,39,49.49S61.92,62.25,59,74.82H124.5c-2.27-8.56,3-25.33,19.57-25.33s23.76,14.85,21,25.33h15.55c2.62,0,4.19-4.72,4.19-10.66,0-3.94-.09-12.27-3.9-18.64"/><path class="cls-3" d="M18.6,74.82H4.9C-0.34,74.82,0,68,0,64H18.7A18.3,18.3,0,0,0,18.6,74.82Z"/><path class="cls-3" d="M165,74.82h15.55c2.62,0,4.19-4.72,4.19-10.66L164.65,64A18.74,18.74,0,0,1,165,74.82Z"/><circle class="cls-3" cx="38.85" cy="70.28" r="17.12"/><circle class="cls-4" cx="38.85" cy="70.28" r="10.31"/><circle class="cls-5" cx="38.85" cy="70.28" r="6.29"/><circle class="cls-3" cx="144.59" cy="70.28" r="17.12"/><circle class="cls-4" cx="144.59" cy="70.28" r="10.31"/><circle class="cls-5" cx="144.59" cy="70.28" r="6.29"/><rect class="cls-6" x="46.51" y="3.81" width="21.39" height="25.55" rx="1.79" ry="1.79"/><path class="cls-6" d="M121.22,29.41l-45.65,0a1.61,1.61,0,0,1-1.4-1.76v-22a1.61,1.61,0,0,1,1.4-1.76h21.6a15.49,15.49,0,0,1,12.27,6l12.67,15.45C123.12,26.35,122.52,29.41,121.22,29.41Z"/><line class="cls-7" x1="70.96" y1="0.01" x2="70.96" y2="74.82"/><line class="cls-7" x1="120.81" y1="29.47" x2="120.81" y2="68.94"/><path class="cls-8" d="M11,34.51a2.77,2.77,0,0,1,2.19,3.25l-2,10.13a2.77,2.77,0,0,1-3.25,2.19L6.56,49.8A2.75,2.75,0,0,1,5.13,49l2.81-7.11Z"/><path class="cls-9" d="M11.6,45.7l-0.42,2.18a2.77,2.77,0,0,1-3.25,2.19L6.56,49.8A2.75,2.75,0,0,1,5.13,49l1.34-3.33H11.6Z"/><path class="cls-8" d="M160.28,41c-3,3.21,4.24,8.84,13.12,11a0.87,0.87,0,0,0,1-1.27C172.25,46.88,163.82,37.14,160.28,41Z"/><path class="cls-9" d="M170.63,45.7a30.41,30.41,0,0,1,3.75,5,0.87,0.87,0,0,1-1,1.27c-5.28-1.28-10-3.78-12.27-6.28h9.49Z"/><path class="cls-10" d="M74.17,33.55v3.08h9.14a1.28,1.28,0,0,0,1.28-1.28v-1.8H74.17Z"/><rect class="cls-4" x="74.17" y="33.55" width="10.42" height="1.8"/><path class="cls-3" d="M58.37,64H125a18.89,18.89,0,0,0-.51,10.83H59S61,68.1,58.37,64Z"/><path class="cls-6" d="M39.66,29.36l-18.6,0A1.59,1.59,0,0,1,19.69,27c2.09-4.82,5.79-12.43,7.58-15.94C29.7,6.37,33,3.81,37.68,3.81h2a1.74,1.74,0,0,1,1.56,1.88v21.8A1.74,1.74,0,0,1,39.66,29.36Z"/><path class="cls-11" d="M111.71,46a10.52,10.52,0,1,1-21,0"/><path class="cls-12" d="M90.67,46a10.52,10.52,0,1,1,21,0"/><path class="cls-13" d="M96.94,43.57l-1.47.35L95,42l2.56-.72h1.76v8.8H96.94V43.57Z"/><path class="cls-13" d="M100.58,48.3l3.27-2.5A2.14,2.14,0,0,0,105,44.23a0.88,0.88,0,0,0-1-.9,2.42,2.42,0,0,0-1.74,1.14l-1.63-1.36a4.06,4.06,0,0,1,3.56-1.87c1.91,0,3.22,1.14,3.22,2.78v0c0,1.4-.72,2.12-2,3.06l-1.5,1h3.61v2h-6.92V48.3Z"/>
	<circle cx="" cy="" r="5" fill="red">


		<animateMotion dur="6s" repeatCount="indefinite">
			<mpath xlink:href="#theMotionPath"/>
		</animateMotion>
	</svg>
</div>

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
			<div class="level-possible"></div>
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
				<h2>Avancera Pauline et Margaux de <span>0%</span> sur leur trajet</h2>

				<input type="hidden" name="return" value="http://localhost/4Ltrophy/index.php">
				<input type="hidden" name="cancel_return" value="http://localhost/4Ltrophy/index.php">
				<input type="hidden" name="notify_url" value="http://localhost4Ltrophy/ipn.php">


				<!-- Display the payment button. -->
				<input type="image" name="submit" border="0"
				src="assets/buttons/donation-button.png"
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

					<p>Contributions <span><?php echo $totalAmount0; ?>€</span></p>
					<p>Avancée <span><?php echo percentageDonation($totalAmount0); ?>%</span></p>
					<p class="italic"><?php echo $totalDonor0; ?> contributeur(s)</p>

				</div>
			</div>

			<div class="col-sm-4 single-day">
				<div class="visual-icon passed">
					<h3>2</h3>
				</div>
				<div class="content">

					<p>Contributions <span><?php echo $totalAmount1; ?>€</span></p>
					<p>Avancée <span><?php echo percentageDonation($totalAmount1); ?>%</span></p>
					<p class="italic"><?php echo $totalDonor1; ?> contributeur(s)</p>

				</div>
			</div>

			<div class="col-sm-4 single-day">
				<div class="visual-icon active">
					<h3>3</h3>
				</div>
				<div class="content">
					<p>Contributions <span><?php echo $totalAmount2; ?>€</span></p>
					<p>Avancée <span><?php echo percentageDonation($totalAmount2); ?>%</span></p>
					<p class="italic"><?php echo $totalDonor2; ?> contributeur(s)</p>
				</div>
			</div>

		</div>

		<div class="row day-range">

			<div class="col-sm-4 single-day">
				<div class="visual-icon">
					<h3>4</h3>
				</div>
				<div class="content">
					<p>Contributions <span><?php echo $totalAmount3; ?>€</span></p>
					<p>Avancée <span><?php echo percentageDonation($totalAmount3); ?>%</span></p>
					<p class="italic"><?php echo $totalDonor3; ?> contributeur(s)</p>
				</div>
			</div>

			<div class="col-sm-4 single-day">
				<div class="visual-icon">
					<h3>5</h3>
				</div>
				<div class="content">
					<p>Contributions <span><?php echo $totalAmount4; ?>€</span></p>
					<p>Avancée <span><?php echo percentageDonation($totalAmount4); ?>%</span></p>
					<p class="italic"><?php echo $totalDonor4; ?> contributeur(s)</p>
				</div>
			</div>
			<?php echo $totalAmount0; ?>	<div class="col-sm-4 single-day">
			<div class="visual-icon">
				<h3>6</h3>
			</div>
			<div class="content">
				<p>Contributions <span><?php echo $totalAmount5; ?>€</span></p>
				<p>Avancée <span><?php echo percentageDonation($totalAmount5); ?>%</span></p>
				<p class="italic"><?php echo $totalDonor5; ?> contributeur(s)</p>
			</div>
		</div>

	</div>				

	<div class="row day-range">
		<div class="col-sm-4 single-day">
			<div class="visual-icon">
				<h3>7</h3>
			</div>
			<div class="content">
				<p>Contributions <span><?php echo $totalAmount6; ?>€</span></p>
				<p>Avancée <span><?php echo percentageDonation($totalAmount6); ?>%</span></p>
				<p class="italic"><?php echo $totalDonor6; ?> contributeur(s)</p>
			</div>
		</div>

		<div class="col-sm-4 single-day">
			<div class="visual-icon">
				<h3>8</h3>
			</div>
			<div class="content">
				<p>Contributions <span><?php echo $totalAmount7; ?>€</span></p>
				<p>Avancée <span><?php echo percentageDonation($totalAmount7); ?>%</span></p>
				<p class="italic"><?php echo $totalDonor7; ?> contributeur(s)</p>
			</div>
		</div>

		<div class="col-sm-4 single-day">
			<div class="visual-icon">
				<h3>9</h3>
			</div>
			<div class="content">
				<p>Contributions <span><?php echo $totalAmount8; ?>€</span></p>
				<p>Avancée <span><?php echo percentageDonation($totalAmount8); ?>%</span></p>
				<p class="italic"><?php echo $totalDonor8; ?> contributeur(s)</p>
			</div>
		</div>

	</div>
</div>



</div>
</div>

<?php require 'footer.php' ?>