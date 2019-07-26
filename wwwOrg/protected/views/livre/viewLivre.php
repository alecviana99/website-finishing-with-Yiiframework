<div class="test"><</div>

<style>::selection{background-color: transparent;}</style>
<script>
        document.onselectstart = new Function("return false");
</script>

<style>
<!--
body {	background-color:#A8A8A8;
		border : 1px solid black;
		color : black;
		}
-->

<?php
include_once "livres/Tome ".$model->ID_LIVRE.".html";
//var_dump($model);
?> 