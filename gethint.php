<?php
	//将姓名填充到数组中
	$a[]="Anna";
	$a[]="Brittany";
	$a[]="Cinderella";
	$a[]="Diana";
	$a[]="Eva";
	$a[]="Fiona";
	$a[]="Gunda";
	$a[]="Hege";
	$a[]="Inga";
	$a[]="Johanna";
	$a[]="Kitty";
	$a[]="Linda";
	$a[]="Nina";
	$a[]="Ophelia";
	$a[]="Petunia";
	$a[]="Amanda";
	$a[]="Raquel";
	$a[]="Cindy";
	$a[]="Doris";
	$a[]="Eve";
	$a[]="Evita";
	$a[]="Sunniva";
	$a[]="Tove";
	$a[]="Unni";
	$a[]="Violet";
	$a[]="Liza";
	$a[]="Elizabeth";
	$a[]="Ellen";
	$a[]="Wenche";
	$a[]="Vicky";
	
	//从请求url地址中获取q参数
	$q=$_GET["q"];
	
	
	//查找是否有匹配值
	if(strlen($q)>0){
		$hint="";
		for($i=0; $i<count($a); $i++)
		{
			if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
			{
				if ($hint=="")
				{
					$hint=$a[$i];
				}
				else
				{
					$hint=$hint." , ".$a[$i];
				}
			}
		}
	}
	if($hint==""){
		$response="no suggsetion";
	}
	else{
		$response=$hint;
	}
	
	echo $response;
	
	
	
	
?>