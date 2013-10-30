<?
include('indb.php');
$a1 = $_REQUEST['a1'];


if($a1 == 'insert') { //Insert
	$sid = $_POST['sid'];
	$tid = $_POST['tid'];
	$name = $_POST['name'];
	$tname = $_POST['tname'];
	$price = $_POST['price'];
	$place = $_POST['place'];
	$day = $_POST['day'];
	$itinerary = $_POST['itinerary'];
	$start_time = $_POST['start_time'];
	$sale_deadline = $_POST['sale_deadline'];
	$use_deadline = $_POST['use_deadline'];
	$meeting_place = $_POST['meeting_place'];
	$lowest_people = $_POST['lowest_people'];
	$telphone = $_POST['telphone'];
	$introduce = $_POST['introduce'];
	$content = $_POST['content'];
	if($insert=pg_query($link,
		"
			insert into kanting_travel values 
			(
				$sid,$tid,'$name','$tname',$price,'$place','$day','$itinerary',
				'$start_time','$sale_deadline','$use_deadline','$meeting_place',
				'$lowest_people','$telphone','$introduce','$content'
			);
		"
	))
	{
		echo '新增成功';
	} else {
		echo 'fails';
	}
}


?>