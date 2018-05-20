<?php
	$randid = "";
	// $sample = array_merge(range("a","z"), range("A","Z"), range(0,9));
	$sample = array_merge(range("A","Z"), range(0,9));
	for ($i = 1; $i < 18; $i++){
		$randid = $randid . $sample[array_rand($sample)];
	}

	$today = localtime();
	echo $randid . '-' . $today[1] . $today[0];
?>