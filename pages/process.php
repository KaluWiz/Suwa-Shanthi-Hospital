<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

   $events = array();
   $query = mysqli_query($con, "SELECT * FROM schedule");
   while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
     $e = array();
     $e['id'] = $fetch['sched_id'];
     $e['title'] = $fetch['sched_event'];
     $time=date("H:i:s",strtotime($fetch['sched_time']));
	sscanf($time, "%d:%d:%d", $hours, $minutes, $seconds);
	$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
	$mil=$time_seconds*1000+28800000;
     $e['start'] =strtotime($fetch['sched_from'])*1000+$mil;
     
     $e['end'] = strtotime($fetch['sched_to'])*1000;
    // $e['time'] = date("H, i",strtotime($fetch['sched_time']));
     $e['backgroundColor']=$fetch['sched_color'];
     $allday = ($fetch['sched_allday'] == "true") ? true : false;
     $e['allDay'] = $fetch['sched_allday'];
     array_push($events, $e);
   }
   echo json_encode($events);

?>