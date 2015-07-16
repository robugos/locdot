<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">
<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

	$(document).ready(function(){
		$("#hide0").click(function(){
			$("#map1").hide();
			$("#map2").hide();
			$("#map0").show();
		});
		$("#show0").click(function(){
			$("#map0").hide();
			$("#map2").hide();
			$("#map1").show();
		});
		$("#hide1").click(function(){
			$("#map1").hide();
			$("#map2").hide();
			$("#map0").show();
		});
		$("#show1").click(function(){
			$("#map0").hide();
			$("#map1").hide();
			$("#map2").show();
		});
		$("#hide2").click(function(){
			$("#map0").hide();
			$("#map2").hide();
			$("#map1").show();
		});
		$("#show2").click(function(){
			$("#map0").hide();
			$("#map1").hide();
			$("#map2").show();
		});

	});
	</script>
<div id="containment-wrapper">
﻿<div id="map0" style="display:block;">
<div style="position: absolute;z-index:10; margin-top:20px; margin-left:20px;"><button id="show0" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">+</button><br><button id="hide0" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">-</button></div>
<div class="draggable ui-widget-content">
<img id="mapa0" src="images/mapa/map2.png" border="0" usemap="#mapa2" alt="" />
<map name="mapa0" id="mapa2">
<area id="4" alt="Espaço Vivência" title="Espaço Vivência" href="index.php?idlocal=4" shape="poly" coords="505,845,504,876,544,877,543,845" style="outline:none;" target="_top"                                                                   />

<area id="1" alt="Edf. Prof Rildo Sartori" title="CEAGRI I" href="index.php?idlocal=1" shape="poly" coords="730,1012,731,1042,879,1039,878,1007,844,1008,843,1000,825,1000,824,1009" style="outline:none;" target="_top"                       />

<area id="2" alt="Edf. Prof. João Vasconcelos Sobrinho" title="CEAGRI II" href="index.php?idlocal=2" shape="poly" coords="730,944,730,971,740,974,738,979,736,984,738,988,740,993,742,997,746,1000,750,1002,754,1004,760,1004,764,1004,767,1002,772,999,774,996,889,992,889,967,906,967,906,952,905,947,902,942,899,939,892,937,756,938,757,950,748,949,748,944" style="outline:none;" target="_top"             />

<area id="3" alt="Laboratório de Gastronomia" title="Lab. Gastronomia" href="index.php?idlocal=3" shape="poly" coords="751,1212,752,1254,883,1250,881,1219,873,1219,873,1182,829,1181,829,1192,789,1191,789,1213" style="outline:none;" target="_top"   />
</map>
</div>
</div>

<div id="map2" style="display:none;">
	<div style="position: absolute;z-index:10; margin-top:20px; margin-left:20px;"><button id="show2" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">+</button><br><button id="hide2" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">-</button></div>
<div class="draggable ui-widget-content">
<img id="mapa2" src="images/mapa/map0.png" border="0" usemap="#mapa0" alt="" />
<map name="mapa2" id="mapa0">

<area shape="rect" coords="2480,3508,2482,3510" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_10737" />

<area id="8" alt="Espaço Vivência" title="Espaço Vivência" href="index.php?idlocal=4" shape="poly" coords="1011,1693,1089,1693,1092,1754,1007,1757" style="outline:none;" target="_top"     />

<area id="5" alt="Edf. Prof Rildo Sartori" title="CEAGRI I" href="index.php?idlocal=1" shape="poly" coords="1465,2089,1759,2080,1758,2015,1691,2021,1689,2004,1651,2007,1651,2023,1464,2028" style="outline:none;" target="_top"     />

<area id="6" alt="Edf. Prof. João Vasconcelos Sobrinho" title="CEAGRI II" href="index.php?idlocal=2" shape="poly" coords="1464,1890,1461,1947,1481,1950,1477,1969,1485,1995,1503,2007,1522,2012,1537,2006,1552,1992,1779,1986,1780,1938,1812,1934,1811,1905,1807,1893,1797,1880,1784,1879,1516,1880,1515,1901,1497,1902,1497,1891" style="outline:none;" target="_top"     />

<area id="7" alt="Laboratório de Gastronomia" title="Lab. Gastronomia" href="index.php?idlocal=3" shape="poly" coords="1507,2429,1506,2509,1770,2502,1767,2444,1749,2441,1746,2367,1663,2366,1660,2386,1580,2387,1579,2429" style="outline:none;" target="_top"     />
</map>
</div>
</div>

<div id="map1" style="display:none;">
	<div style="position: absolute;z-index:10; margin-top:20px; margin-left:20px;"><button id="show1" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">+</button><br><button id="hide1" class="btn btn-warning btn-sm" style="width:40px; height:40px; line-height: 30px; margin:5px;">-</button></div>
<div class="draggable ui-widget-content">
<img id="mapa1" src="images/mapa/map1.png" border="0" usemap="#mapa1" alt="" />
<map name="mapa1" id="mapa1">
 
<area id="12" alt="Espaço Vivência" title="Espaço Vivência" href="index.php?idlocal=4" shape="poly" coords="756,1267,756,1315,816,1314,816,1267" style="outline:none;" target="_top"                                                                   />

<area id="9" alt="Edf. Prof Rildo Sartori" title="CEAGRI I" href="index.php?idlocal=1" shape="poly" coords="1095,1519,1096,1565,1318,1558,1316,1510,1268,1511,1265,1500,1235,1500,1235,1513" style="outline:none;" target="_top"                       />

<area id="10" alt="Edf. Prof. João Vasconcelos Sobrinho" title="CEAGRI II" href="index.php?idlocal=2" shape="poly" coords="1095,1416,1095,1459,1108,1461,1106,1466,1105,1472,1105,1477,1106,1481,1107,1487,1110,1492,1114,1496,1118,1500,1122,1502,1127,1504,1132,1506,1137,1506,1142,1506,1147,1506,1151,1504,1154,1501,1159,1498,1162,1493,1334,1488,1334,1451,1358,1451,1358,1439,1358,1431,1357,1425,1356,1420,1355,1415,1353,1412,1349,1408,1344,1407,1339,1406,1134,1407,1135,1424,1122,1425,1122,1415" style="outline:none;" target="_top"             />

<area id="11" alt="Laboratório de Gastronomia" title="Lab. Gastronomia" href="index.php?idlocal=3" shape="poly" coords="1128,1819,1130,1880,1325,1875,1324,1829,1312,1830,1310,1772,1243,1772,1242,1787,1183,1787,1183,1819" style="outline:none;" target="_top"   />
</map>
</div>
</div>

</div>