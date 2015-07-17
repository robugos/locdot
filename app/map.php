<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">
<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

	$(document).ready(function(){
		$("#hide0").click(function(){
			$("#map0").show();
			$("#map1").hide();
			$("#map2").hide();
		});
		$("#show0").click(function(){
			$("#map0").hide();
			$("#map1").show();
			$("#map2").hide();
		});
		$("#hide1").click(function(){
			$("#map0").show();
			$("#map1").hide();
			$("#map2").hide();
		});
		$("#show1").click(function(){
			$("#map0").hide();
			$("#map1").hide();
			$("#map2").show();
		});
		$("#hide2").click(function(){
			$("#map0").hide();
			$("#map1").show();
			$("#map2").hide();
		});
		$("#show2").click(function(){
			$("#map0").hide();
			$("#map1").hide();
			$("#map2").show();
		});

	});
	</script>
<div id="containment-wrapper">
﻿

<div id="map0" style="display:block;">
<div style="position: absolute;z-index:10; margin-top:20px; margin-left:20px;">
	<button id="hide0" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">+</button><br>
	<button id="show0" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">-</button></div>
<div class="draggable ui-widget-content">
<img id="mapa0" src="images/mapa/map0.png" border="0" usemap="#mapa0" alt="" />
<map name="mapa0" id="mapa0">
<area shape="rect" coords="2480,3508,2482,3510" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_10737" />
<area id="4" alt="Espaço Vivência" title="Espaço Vivência" href="index.php?idlocal=4" shape="poly" coords="936,776,934,840,1015,839,1015,776" style="outline:none;" target="_top"     />
<area id="1" alt="Edf. Prof Rildo Sartori" title="CEAGRI I" href="index.php?idlocal=1" shape="poly" coords="1389,1113,1389,1175,1685,1165,1684,1099,1614,1104,1611,1085,1576,1090,1572,1108" style="outline:none;" target="_top"     />
<area id="2" alt="Edf. Prof. João Vasconcelos Sobrinho" title="CEAGRI II" href="index.php?idlocal=2" shape="poly" coords="1386,974,1386,1030,1405,1035,1401,1046,1401,1056,1401,1066,1408,1075,1417,1085,1426,1093,1435,1094,1444,1094,1460,1094,1467,1088,1477,1079,1707,1072,1705,1020,1737,1021,1736,1003,1736,988,1735,980,1731,973,1725,968,1720,964,1709,964,1440,963,1442,990,1423,990,1423,974" style="outline:none;" target="_top"     />
<area id="3" alt="Laboratório de Gastronomia" title="Lab. Gastronomia" href="index.php?idlocal=3" shape="poly" coords="1431,1512,1434,1593,1694,1587,1692,1525,1677,1526,1674,1449,1584,1449,1584,1469,1504,1469,1504,1513" style="outline:none;" target="_top" />
</map>
</div>
</div>

<div id="map1" style="display:block;">
<div style="position: absolute;z-index:10; margin-top:20px; margin-left:20px;">
	<button id="hide1" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">+</button><br>
	<button id="show1" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">-</button></div>
<div class="draggable ui-widget-content">
<img id="mapa1" src="images/mapa/map1.png" border="0" usemap="#mapa1" alt="" />
<map name="mapa1" id="mapa1">
<area id="4" alt="Espaço Vivência" title="Espaço Vivência" href="index.php?idlocal=4" shape="poly" coords="693,589,693,636,753,636,751,589" style="outline:none;" target="_top"                                                                   />
<area id="1" alt="Edf. Prof Rildo Sartori" title="CEAGRI I" href="index.php?idlocal=1" shape="poly" coords="1033,841,1032,887,1255,878,1253,832,1202,834,1200,820,1171,824,1171,837" style="outline:none;" target="_top"                       />
<area id="2" alt="Edf. Prof. João Vasconcelos Sobrinho" title="CEAGRI II" href="index.php?idlocal=2" shape="poly" coords="1032,736,1031,779,1042,783,1040,792,1040,800,1044,803,1047,812,1053,818,1058,821,1065,824,1072,827,1082,827,1089,825,1091,820,1095,815,1271,811,1270,772,1294,772,1294,757,1294,749,1294,744,1291,740,1289,736,1287,734,1283,732,1275,728,1070,729,1073,747,1058,747,1058,736" style="outline:none;" target="_top"             />
<area id="3" alt="Laboratório de Gastronomia" title="Lab. Gastronomia" href="index.php?idlocal=3" shape="poly" coords="1065,1142,1065,1203,1262,1197,1260,1151,1247,1151,1245,1094,1178,1094,1178,1109,1118,1108,1119,1142" style="outline:none;" target="_top"   />>
</div>
</div>

<div id="map2" style="display:none;">
<div style="position: absolute;z-index:10; margin-top:20px; margin-left:20px;">
	<button id="hide2" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">+</button><br>
	<button id="show2" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">-</button></div>
<div class="draggable ui-widget-content">
<img id="mapa2" src="images/mapa/map2.png" border="0" usemap="#mapa2" alt="" />
<map name="mapa2" id="mapa2">
<area id="4" alt="Espaço Vivência" title="Espaço Vivência" href="index.php?idlocal=4" shape="poly" coords="468,401,468,432,508,432,508,401" style="outline:none;" target="_top"                                                                   />
<area id="1" alt="Edf. Prof Rildo Sartori" title="CEAGRI I" href="index.php?idlocal=1" shape="poly" coords="694,570,694,600,842,595,840,563,806,565,805,556,788,556,788,568" style="outline:none;" target="_top"                       />
<area id="2" alt="Edf. Prof. João Vasconcelos Sobrinho" title="CEAGRI II" href="index.php?idlocal=2" shape="poly" coords="692,499,693,524,700,528,700,534,700,540,703,548,707,554,713,557,722,560,727,559,734,555,739,550,749,550,763,548,853,548,852,521,869,522,869,507,866,499,861,494,857,494,851,489,720,492,721,504,711,507,711,500" style="outline:none;" target="_top"             />
<area id="3" alt="Laboratório de Gastronomia" title="Lab. Gastronomia" href="index.php?idlocal=3" shape="poly" coords="716,769,716,811,848,806,847,775,837,775,836,736,792,736,794,749,752,746,752,770" style="outline:none;" target="_top"   /></map>
</map>
</div>
</div>