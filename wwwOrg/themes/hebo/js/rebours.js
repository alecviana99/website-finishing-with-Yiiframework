var debug = false;
Dodebug("voilà quelque chose");

$(document).ready(function() {
	$('input.round').wrap('<div class="round" />').each(function(){
		var input = $(this);
		var div = input.parent();
		var cercle = $('<canvas class="cercle" width="220px" height="220px" />');
		var color = $('<canvas class="color" width="220px" height="220px" />');
		div.append(cercle);
		div.append(color);
	});
	Init_temps();
	Affichage();
	Rebour();

});

function Init_temps(){
	//var seconde = $('label#round')
	var jours = $('input#jours');
	var heures = $('input#heures');
	var minutes = $('input#minutes');
	var secondes = $('input#secondes');
	var now = new Date();
	var finale = new Date ("November 11 18:15:15 2015");
	//var finale = new Date(year, month, day, hours, minutes, seconds, milliseconds);
	var sec = (finale - now) / 1000;
	var n = 24 * 3600;
	if (sec > 0) {
		j = Math.floor (sec / n);
		h = Math.floor ((sec - (j * n)) / 3600);
		mn = Math.floor ((sec - ((j * n + h * 3600))) / 60);
		sec = Math.floor (sec - ((j * n + h * 3600 + mn )));
		jours.val(j);
		heures.val(h);
		minutes.val(mn);
		secondes.val(sec);
		//seconde.val(sec);
		Dodebug(sec);
		//console.log(mn);
		//console.log(h);
		//console.log(mn);
		Dodebug(now);
		Dodebug(finale);
	}
}

function Affichage(){
	$('input.round').each(function(){
		var input = $(this);
		var div = input.parent();
		var min = input.data('min');
		var max = input.data('max');
		cercle = div.children('.cercle');
		color = div.children('.color');
		// console.log('Init : '+$input.prop('id')+' '+$color.toSource());			
		/*
		var ctx = $cercle[0].getContext('2d');
		ctx.clearRect(0,0,220,220);
		ctx.beginPath();
		ctx.arc(110,110,95,0,2*Math.PI);
		ctx.lineWidth = 20;
		ctx.strokeStyle = "#fff";
		ctx.shadowOffsetX = 2;
		ctx.shadowBlur = 5;
		ctx.shadowColor = "rgba(0,0,0,0.5)";
		ctx.stroke();
		*/ 
		var ratio = (input.val() - min) / (max - min);
		var ctx = color[0].getContext('2d');
		ctx.clearRect(0,0,220,220);
		ctx.beginPath();
		ctx.arc(110,110,80,-1/2 * Math.PI, ratio*2*Math.PI - 1/2 * Math.PI);
		ctx.lineWidth = 20;
		ctx.strokeStyle = "#ffaabb";
		ctx.stroke();
	});
}

function Rebour() {
	Init_temps();
	Affichage();
	window.setTimeout(Rebour, 1000);
}

function Dodebug(msg){
	if(debug){
		console.log(msg);
	}
}