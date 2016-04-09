<?php

//substr() function used to get only some part of a string
$kod = substr($nokp,6,2);
$jantina = "";

if((substr($nokp, 11, 1))%2 == 0)
{
	$jantina = "Female";
}
else
{
	$jantina = "Male";
}

//multidimensional array
$kodnegeri = array
					(
						array("Johor","01","21","22","23","24") ,
						array("Kedah", "02","25","26","27") ,
						array("Kelantan","03","28","29") ,
						array("Melaka","04","30") ,
						array("Negeri Sembilan","05","31","59") ,
						array("Pahang","06","32","33") ,
						array("Pulau Pinang","07","34","35") ,
						array("Perak","08","36","37","38","39") ,
						array("Perlis", "09", "40"),
						array("Selangor","10","41","42","43","44") ,
						array("Terengganu","11","45","46") ,
						array("Sabah","12","47","48","49") ,
						array("Sarawak","13","50","51","52","53") ,
						array("Wilayah Persekutuan (Kuala Lumpur)","14","54","55","56","57") ,
						array("Wilayah Persekutuan (Labuan)","15","58") ,
						array("Wilayah Persekutuan (Putrajaya)","16") ,
						array("Negeri Tidak Diketahui","82") 
					);


$size = count($kodnegeri);

$i = 0;
$j = 0;
$statename = "";

for($i=0; $i<$size; $i++)
{
	$sizes = count($kodnegeri[$i]);
	
	for($j=0; $j<$sizes; $j++)
	{
		if($kod == $kodnegeri[$i][$j])
		{
			$statename = $kodnegeri[$i][0];
		}
	}
	
	
}


?>