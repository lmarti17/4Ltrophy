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

function dateNow($calendarDate){

	$datetime1 = date_create($calendarDate);
	date_default_timezone_set('Europe/Paris');
	$datetime2 = date_create(date('Y/m/d', time()));
	$interval = date_diff($datetime1, $datetime2);
	if ($interval->format('%a') == 0) {
		echo 'active';
	} else if($interval->format('%R%a') > 0){
		echo "passed";
	}

}
bestOf($listResult);

$pourcentageDonation = $totalDonation/10;
$toDoStill = 100 - $pourcentageDonation;
$totatDonationDay = 0;
$totalDonorDay = 0;

?>

<?php require 'header.php' ?>
<?php require 'help.php' ?>


<div class="landing-video">
	<video id="video-intro" src="assets/intro.mp4" autoplay></video>
	<button class="skip-button">Passer l'intro</button>
</div>

<div class=" row wrapper">
	<!-- div map -->
	<div class="col-md-6 left-container">
		<div id="map">
			<div class="success-video-container">
				<video id="success-video" src="assets/success.mp4"></video>
			</div>
		</div>
	</div>
	<div class="col-md-6 right-container">
		<!-- div donation -->
		<div id="donation">
			<h1>4L Trophy</h1>
			<h2 class="subtitle">Aidez Pauline et Margaux dans leur trajet vers Marrakesh en participant aux dons pour l'Association "Les Enfants du Désert".</h2>

			<!-- Jauge d'avancement des dons -->
			<div class="row level">
				<!-- ici la jauge d'avancement de Pauline et Margaux -->
				<div class="col-xs-2">
					<img src="assets/biarritz.png" alt="biarritz" class="biarritz-img">
				</div>
				<div class="col-xs-8 level-background">
					<div class="level-real"></div>
					<div class="level-possible"></div>
				</div>
				<div class="col-xs-2">
					<img src="assets/marrakesh.png" alt="Marrakesh" class="marrakesh-img">
				</div>

			</div>
			<p class="level">Il reste à Pauline et Margaux <?php echo $toDoStill;?>% du trajet à accomplir</p>

			<!-- Global donations statistics  -->
			<div class="global-donation">


				<div class="timer-before-donation">
					<p class="timer">Début de la course dans :</p>
					<div id="days" class='timer'>
					</div>
					<div id="hours" class='timer'>
					</div>
					<div id="minutes" class='timer'>
					</div>
					<div id="seconds" class='timer'>
					</div>
				</div>

				<div class="row donation-statistics">
					<div class="col-md-6 numbers">
						<!-- total amount donation -->
						<div class="total-donation">
							<div class="amount-donation"><h2 class="orange"><?php echo $totalDonation; ?>€ collectés</h2><span>sur un objectif de 1000€</span></div>
							<div class="amount-percentage">
								<h2 class="orange"><span><?php echo $pourcentageDonation; ?></span>%</h2>
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
						<a href="#" class="contribute-button"><img src="assets/buttons/contribuer-au-projet.png" alt="Contribution"></a>
					</div>
				</div>
				<div class="make-donation">
					<h1>Faire un don à l'association les enfants du désert</h1>
					<div class="to-flex">
						<h2>Montant</h2>
						<form id="donationForm" action="#" method="post">
							<input type="number" id="amount" name="amount" step="1" value="0" min="1">

							<h2>Avancera Pauline et Margaux de <span>0%</span> sur leur trajet</h2>

							<input type="image" name="submit" border="0"
							src="assets/buttons/donation-button.png"
							alt="PayPal - The safer, easier way to pay online">

						</form>
						
					</div>
				</div>
				<div class="donation-success">
					<h2>Merci pour votre contribution !</h2>
					<p>Votre don sera versé à l'Association "Les enfants du Désert" à l'issu des 9 jours de quête.</p>
				</div>
			</div>

			<!-- Days donations statistics -->
			<div class="daily-donations">
				<div class="row day-range">
					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-18'); ?>">
							<h3>1</h3>
						</div>
						<div class="content">

							<p>Contribution <span><?php echo $totalAmount0; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount0); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor0; ?> contributeur(s)</p>

						</div>
					</div>

					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-19'); ?>">
							<h3>2</h3>
						</div>
						<div class="content">

							<p>Contribution <span><?php echo $totalAmount1; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount1); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor1; ?> contributeur(s)</p>

						</div>
					</div>

					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-20'); ?>">
							<h3>3</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount2; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount2); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor2; ?> contributeur(s)</p>
						</div>
					</div>

				</div>

				<div class="row day-range day-range-2">

					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-21'); ?>">
							<h3>4</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount3; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount3); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor3; ?> contributeur(s)</p>
						</div>
					</div>

					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-22'); ?>">
							<h3>5</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount4; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount4); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor4; ?> contributeur(s)</p>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-23'); ?>">
							<h3>6</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount5; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount5); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor5; ?> contributeur(s)</p>
						</div>
					</div>

				</div>				

				<div class="row day-range">
					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-24'); ?>">
							<h3>7</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount6; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount6); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor6; ?> contributeur(s)</p>
						</div>
					</div>

					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-25'); ?>">
							<h3>8</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount7; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount7); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor7; ?> contributeur(s)</p>
						</div>
					</div>

					<div class="col-md-6 col-lg-4 single-day">
						<div class="visual-icon <?php dateNow('2016-02-26'); ?>">
							<h3>9</h3>
						</div>
						<div class="content">
							<p>Contribution <span><?php echo $totalAmount8; ?>€</span></p>
							<p>Avancée <span><?php echo percentageDonation($totalAmount8); ?>%</span></p>
							<p class="italic"><?php echo $totalDonor8; ?> contributeur(s)</p>
						</div>
					</div>

				</div>
			</div>



		</div>
	</div>
</div>

<?php require 'footer.php' ?>