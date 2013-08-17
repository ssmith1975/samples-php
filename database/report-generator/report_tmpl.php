<?php
////////////////////////////////////////////////
/* 
* REPORT TEMPLATE
*
*/
//////////////////////////////////////////////// 

// Perform Query
if (isset($columns)){
	$columnsCount = count($columns);
}
$result = $mysqli->query($query) or die('<p>Oops! An error just occurred while executing a query statement.</p><p>'. $mysqli->error).'</p>' ;
$rowCount =  $result->num_rows;

// Wrapper Functions 
function arrayResults() { // for array results
	global $result;
	return $result->fetch_array();
}

function scalarResult($fieldtitle=0) {  // for single value results
	global $result;
	$single_row =  $result->fetch_array();
	return $single_row[$fieldtitle];
}

?>
<!-- Begin Report Table -->
			<table width="100%" id="<?php print $tableId; ?>" class="report<?php if (isset($tableClass)) {print " ".$tableClass;} ?>">
				<caption><?php print $reportTitle ; ?></caption>
			<?php if($result && ($fetchIt == "arrayResults")): // Check If record exists and the return is an array ?>				
				<!-- Display table header -->
				<thead>
				<tr>		
				<?php foreach($columns as $column): ?>

					<th width="<?php if( isset($column["columnWidth"]) ) print $column["columnWidth"];  ?>">								
					<?php  if( isset($column["columnTitle"]) ) print $column["columnTitle"]; ?>
					</th>
			   
				<?php endforeach; ?>
				</tr>	
				</thead>
				
				<!-- Display table data from database -->	

						
				<tbody class="datacell">
					<?php	$sum = 0;  	// Initialize accumalation variables ?>
					<?php while($row = $fetchIt()): ?>
					<tr>
						<?php foreach($columns as $column): ?>
						<td class="<?php if ($column["sqlColumnName"] == $summary["ColumnToSUM"]) print $summary["ColumnToSumClass"];  ?>" align="<?php if( isset($column["columnAlign"]) ) print $column["columnAlign"];  ?>">
						<?php if ( isset($column["image"]) ): ?>
							<img src="<?php print $column["image"]["imageDir"].$row[$column["sqlColumnName"]];?>" width="<?php print $column["image"]["width"]; ?>" height="<?php print $column["image"]["height"]; ?>" alt="" />
						<?php else: ?>
							<?php print $row[$column["sqlColumnName"]];?>
						<?php endif; ?>
						</td>
																				
							<?php 
								// Add column data to sum if set
								
								if (isset( $summary["ColumnToSUM"]) ){
									
									if ($column["sqlColumnName"] == $summary["ColumnToSUM"]) $sum += $row[$summary["ColumnToSUM"]]; 
								}
								
							?>
							
						<?php endforeach; ?>
					</tr>	
					<?php endwhile; ?>
					
					<?php  if (isset( $summary["ColumnToSUM"]) )$summary["Results"] = $sum; ?>
				</tbody>
				
				<?php if(isset($summary)):?>			
				<tbody>
					<tr><th class="summary-header" colspan="<?php print $columnsCount-1; ?>"><?php  print $summary["Title"]; ?>:</th>
					<td class="summary-results"><?php print $summary["Results"]; ?></td></tr>						
				</tfoot>				
				<?php endif; ?>
				
				
			<?php elseif($result && ($fetchIt == "scalarResult")): //  If result exists, display return as single value. ?>
				<?php $summary["Results"] = $fetchIt(/*$result, $resultData["Row"],*/ $resultData["Field"]); ?>
				<tbody>
					<tr>
					<tr><th class="summary-header"><?php  print $scalar["Title"]; ?>:</th>
					<td class="summary-results"><?php print $summary["Results"]; ?></td>
					</tr>
				</tbody>				
				
			<?php else: // When no results are found.$summary["ColumnToSUM"] ?>
				<tbody>
					<tr><td class="summary-results" colspan="<?php print $columnsCount; ?>">No results found.</td></tr>
				</tfoot>
			<?php endif; ?>
										
			</table>
			<!-- Display number of rows returned from database -->
			<div class="num-rows">
				<p>Number of rows returned: <?php echo $rowCount; ?></p>  
				<div id="creation_date">Created: <?php print date('l, F d, Y h:i:s A'); ?></div>
				<div class="clear"> </div>
			</div>	
			
			<?php $mysqli->close(); // Close database connection  ?>
			
			
			