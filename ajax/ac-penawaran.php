<?php
	include "../library/conn.php";
	$term = trim(strip_tags($_GET['term']));
	  
	$qstring = "SELECT * FROM pp_hdr WHERE nama_proyek LIKE '".$term."%'";
	$result = mysql_query($qstring);
	  
	while ($row = mysql_fetch_array($result))
	{
		$row['value']=htmlentities(stripslashes($row['nama']));
		$row['id']=(int)$row['id'];
		$row_set[] = $row;
	}
	echo json_encode($row_set);
?>