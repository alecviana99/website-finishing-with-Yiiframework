<style>
.tblhistocredits a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
.tblhistocredits a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
.tblhistocredits a:active,
.tblhistocredits a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
.tblhistocredits {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:auto;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
.tblhistocredits th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
.tblhistocredits th:first-child {
	text-align: left;
	padding-left:20px;
}
.tblhistocredits tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
.tblhistocredits tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
.tblhistocredits tr {
	text-align: center;
	padding-left:20px;
}
.tblhistocredits td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
.tblhistocredits td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
.tblhistocredits tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
.tblhistocredits tr:last-child td {
	border-bottom:0;
}
.tblhistocredits tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
.tblhistocredits tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
.tblhistocredits tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}
</style>

<div class="jumbotron">
<?php

	
	$totalCreAchetes = 0;
	$histoCres = HistoCreditsAchetesHca::model()->findAll('uti_id=:uti_id',
				array(
						':uti_id'=>Yii::app()->user->id,
					));
	
	$post = $histoCre;
	echo "<table class='tblhistocredits'>";
	echo "<tr><th>Date d'achat </th><th> Crédits achetés</th></tr>";
	foreach($histoCres as $histoCre)
	{
		echo "<tr>";
		echo "<td>" . $histoCre->date_hca . "</td>";
		echo "<td>" . $histoCre->credits_hca . "</td>";
		echo "</tr>";
		$total += $histoCre->credits_hca;
	}
	
	echo "</table>";
	
	$heures=intval($total / 3600);
	$minutes=intval(($total % 3600) / 60);
	$secondes=intval((($total % 3600) % 60));
	
	
	echo "<br/>";
	echo "<p>Vous avez acheté " . $total . " crédits de temps au total.</p>";
	echo "<p>Soit ". $heures." heures : ". $minutes ." minutes : ". $secondes. " secondes</p>";
	echo "<a class='enext' href='../profile'>";
	echo "Revenir sur le profil";
	echo "</a>";
?>

</div>