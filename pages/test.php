<?php 
$payment_for = date("Y-m-d",strtotime("2016-1-20"));
$date = date("Y-m-d");
			
                        $due1 = date("Y-m-d",strtotime($payment_for. " +1 months"));
						$due2 = date("Y-m-d",strtotime($due1. " +5 days"));
						
                        if ($date > $due2)
                          {
                            $interest=100*.05;
                            
                          } 
                         else
                          {
                            $interest=0;
                            
                          }
						 echo "<br>";
						  echo $interest;
		?>