<style>
.tblSug a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
.tblSug a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
.tblSug a:active,
.tblSug a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
.tblSug {
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
.tblSug th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
.tblSug th:first-child {
	text-align: left;
	padding-left:20px;
}
.tblSug tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
.tblSug tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
.tblSug tr {
	text-align: center;
	padding-left:20px;
}
.tblSug td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
.tblSug td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
.tblSug tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
.tblSug tr:last-child td {
	border-bottom:0;
}
.tblSug tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
.tblSug tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
.tblSug tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}
</style>

<div class="jumbotron">

<?php
/* @var $this SuggestionSugController */
/* @var $model SuggestionSug */

/* $this->breadcrumbs=array(
	'Suggestion Sugs'=>array('index'),
	'Manage',
); */

$this->menu=array(
	array('label'=>'List SuggestionSug', 'url'=>array('index')),
	array('label'=>'Create SuggestionSug', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suggestion-sug-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<h1>Gestion des suggestions</h1>

<p><?php echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a>';?></p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	// 'model'=>$model,
// )); ?>
</div><!-- search-form -->

<?php 

	
// $this->widget('zii.widgets.grid.CGridView', array(
	// 'id'=>'suggestion-sug-grid',
	// 'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	// 'columns'=>array(
		// 'qst_id',
		// 'sug_texte',
		// 'sug_date',
		// array(
			// 'class'=>'CButtonColumn',
		// ),
	// ),
// )); 

$suggestions = SuggestionSug::model()->findAll(array(
		'select'=>qst_id,
		'group'=>qst_id,
		'distinct'=>true));
		
echo "<table class='tblSug'>";
echo "<tr><th>ID</th><th>Question</th><th>Nombre de suggestions</th></tr>";

foreach($suggestions as $sug)
{
	$questionSug = QuestionQst::model()->find('qst_id = :qst_id', array(
		':qst_id'=>$sug->qst_id,
		
	));
	$NulZero = SuggestionSug::model()->findAll('qst_id = :qst_id', array(
		':qst_id'=>$sug->qst_id,
		
	));
	
	echo "<tr>";
	echo "<td><a href='viewSugQst?question=".$questionSug->qst_id."'>".$questionSug->qst_id."</a>.</td>";
	echo "<td>" . $questionSug->qst_question. "</td>";
	echo "<td>" . count($NulZero) . "</td>";
	echo "</tr>";
	
	
	
}
echo "</table>";?>

</div>