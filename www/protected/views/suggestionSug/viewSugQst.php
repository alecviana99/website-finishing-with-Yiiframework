<style>
.beautableau a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
.beautableau a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
.beautableau a:active,
.beautableau a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
.beautableau {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
.beautableau th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
.beautableau th:first-child {
	text-align: left;
	padding-left:20px;
}
.beautableau tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
.beautableau tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
.beautableau tr {
	text-align: center;
	padding-left:20px;
}
.beautableau td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
.beautableau td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
.beautableau tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
.beautableau tr:last-child td {
	border-bottom:0;
}
.beautableau tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
.beautableau tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
.beautableau tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}
</style>

<div class="jumbotron">

<?php

$questionId = $_GET['question'];

$question = QuestionQst::model()->find('qst_id = :qst_id', array(
		':qst_id'=>$questionId,
		
	));
if(isset(Yii::app()->session['qstSugId']))
	unset(Yii::app()->session['qstSugId']);
Yii::app()->session['qstSugId'] = $questionId;	

echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a><br/>';
echo '<a class="btn enext" href="../suggestionSug/admin">Gestion des suggestions</a><br/>';

echo "<h2>Question n°$questionId</h2>";


echo $question->qst_question . "<br/><br/>";

$suggestions = SuggestionSug::model()->findAll('qst_id = :qst_id', array(
		':qst_id'=>$question->qst_id,
	));
	

	
	

echo "<center><table class='beautableau'>";
echo "<tr><th>Suggestion</th><th>Utilisateur</th><th>Date</th><th></th>";

foreach($suggestions as $sug)
{
	$user = TblUsers::model()->find('id = :id', array(
		':id'=>$sug->uti_id,
	));
	echo "<tr>";
	echo "<td>" . $sug->sug_texte . "</td>";
	echo "<td>" . $user->username . "</td>";
	echo "<td>" . $sug->sug_date . "</td>";
	echo "<td><form id='form_supprimer' method='post' action='traitement?suggestion=".$sug->sug_id."'><input type='submit' value='Supprimer' name='btn_suppr'/></form></td>";
	echo "</tr>";
}
echo "</table></center>";


?>

</div>