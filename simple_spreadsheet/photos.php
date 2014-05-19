<?php
	$row = $_GET["row"];
	$col = $_GET["col"];
	$photos = new DirectoryIterator('photos/');
	$cols = 0;
	print "<script>";
	print "function imageClicked(num){\n";
	print "if(window.opener){\n";
	print "window.opener.document.getElementById(\"".$row."_".$col."\").childNodes[0].innerHTML = \"<img width = '50' height = '50' src='\"+document.images[num].src+\"'>\";\n";
	print "}\n";
	print "window.close()";
	print "}\n";
	print "</script>";
	
	print "<table>\n";
	foreach($photos as $pic){
		if($pic != "." && $pic != "..")
		{
			if($cols%4 == 0){
				print "<tr>\n";
			}
			print "<td><img width='100' height='100' src ='photos/".$pic."' onclick='imageClicked(".$cols.")'></td>\n";
			if($cols%4 == 3){
				print "</tr>\n";
			}
			$cols++;
		}
	}
	print "</table>";
?>