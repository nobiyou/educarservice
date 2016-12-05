<?PHP
if($_POST){

require '../config/mysql.php';
require '../config/connect.php';
$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

$user = $mysql->queryResult(
    "
    SELECT *  FROM `adminpr`
    WHERE `uadmin` = %s[username]  and  `padmin` = %s[password] 
    ",
    array(
        'username' => $_POST['username'],					// แทนที่ %s[username]
        'password'  =>$_POST['password'],	// แทนที่ %s[password]
               
    )
);

$total=$user->numRows;
$rs = $user->fetch();
//echo $total;
if($total===1){
		$_SESSION['idadmin'] =$rs['idadmin'];
		$_SESSION['uname'] =$rs['uname'];
		$_SESSION['login'] = "true";
			echo("<script>");
            echo("window.location='main.php?menu=add';");
            echo("</script>"); 


}else{
?>
 
  <div class="alert alert-danger">
    <a class="close" data-dismiss="alert" aria-hidden="true">×</a>
    <strong>คำเตือน!</strong> Username และ Password ของท่านไม่ถูกต้อง.
</div>
            <?php
}

$mysql->close();
}

	?>