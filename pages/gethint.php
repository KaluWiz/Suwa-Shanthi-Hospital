<?php
// Array with names

include('../dist/includes/dbcon.php');
$query=mysqli_query($con,"select fname,lname,resident_id from resident")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
	   

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($row as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
            $id=$row['resident_id'];
		echo "<div style='margin-bottom:5px;' class='searchresult'>";
		
                $hint ="<a href=''>".$row['fname']." ".$row['lname']."</a>";
                echo "</div>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint;
}
?>