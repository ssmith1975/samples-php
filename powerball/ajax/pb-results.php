<?php
// Powerball Generator Results

include_once "../lib/RandomNumberList.php";
	
if (isset($_GET['tickets'])){
 	$numOfTickets = $_GET['tickets'];
 } else {
 	header('Location: index.php');
 }

    sleep(1);

	$randomArrayObj1 = new RandomNumberList(1,59,5);
	$randomArrayObj2 = new RandomNumberList(1,39,1);
?>

	<table id="pb-results-table" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<th class="pb-results-header">5 White Balls</th>
		<th class="pb-results-header">Powerball</th>
	</tr>



	<?php for ($i=0; $i<$numOfTickets; $i++){ ?>

		<tr class="pb-results-row">
			<td  class="group1">
				
				<?php 
					$randomArrayObj1->generateRandom();
					$array1 = $randomArrayObj1->getArray();
				 	$randomArrayObj1->printRandom($array1); ?>
			</td>
			<td class="group2">	
				
				<?php $randomArrayObj2->generateRandom(); 
					$array2 = $randomArrayObj2->getArray();
					$randomArrayObj2->printRandom($array2);  ?>
			</td>	
		</tr>
	<?php  } ?>
	
	
	</table>