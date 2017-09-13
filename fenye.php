<?php
	//数据库连接
	$servername = "localhost";
	$username = "root";
	$password = "12345678";
	$dbname = "mydb";
	 
	// 创建链接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检查链接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	} 
	
	//每页显示的留言数
	$pagesize = 4;
	
	//确定页数p参数
	$p=$_GET['q']?$_GET['q']:1;
	
	//数据指针
	$offset = ($p-1)*$pagesize;
	
	//查询本页的数据
	$query_sql="select * from guestbook order by id DESC limit $offset,$pagesize";
	$results=$conn->query($query_sql);
	while($gblist = $results->fetch_assoc()){
    echo '<a href="',$gblist['nickname'],'">',$gblist['nickname'],'</a>';
    echo '发表于：',date("Y-m-d H:i", $gblist[createtime]),'<br />';
    echo '内容：',$gblist['content'],'<br /><hr />';
   }
   //分页代码
   
   //计算留言数
    $count_result = $conn->query("SELECT count(*) as count FROM guestbook");
	$count_array = $count_result->fetch_assoc();
	
	//计算页的总数
	$pagenum = ceil($count_array['count']/$pagesize);
	echo '共 ',$count_array['count'],' 条留言';
	
	//循环输出各页数目以及连接
	if($pagenum>1){
		for($i=1;$i<=$pagenum;$i++){
			if($i==$p){
				echo ' [',$i,']';
			}else{
				echo "<a href='fenye.php?q=$i'> $i </a>";
			}
		}
		
	}
	 
	
	
?>