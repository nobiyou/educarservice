<?php
include 'chk_session.php';
?>
<div class="row">
<div class="col-lg-12">
<pre>
<?php
print_r($_POST);

require '../config/mysql.php';
require '../config/connect.php';
require '../config/thai_date.php';
$mysql=new MySQL_Connection("$host","$user","$pw","$dbname");
$mysql->charset = 'utf8';

$typecar = array_filter($_POST['typecar']);
$driver = array_filter($_POST['driver']);

echo $_POST['date-start']." --> ". thai9($_POST['date-start'])."<br>";
echo $_POST['date-end']." --> ". thai9($_POST['date-end'])."<br>";

for($i=0;$i<count($typecar);$i++){

$timego = thai9($_POST['date-start']);
$timeback = thai9($_POST['date-end']);

$mysql->query(
 "
 INSERT ignore  INTO `car`
(	`name`, `object`, `locate`, `timego`, `timeback`, 	`typecar`, `driver`
)
VALUES
(	%s,%s,%s,%s,%s,%s,%s
)
",
    array(
		$_POST['name'],
		$_POST['object'],
		$_POST['locatetion'],
		$timego,
		$timeback,
		$_POST['typecar'][$i],
		$_POST['driver'][$i],
		
    )
);
	
	

}
$mysql->close();
?>
</pre>
</div>
</div>