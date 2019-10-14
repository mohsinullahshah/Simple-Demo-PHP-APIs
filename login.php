<?php 
	
	include_once 'DBOperation.php';
	$response = array(); 

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
       if (isset($_POST['contact_number']))
       {
   			$db = new DbOperation();

	   
	       	$checking_user = $db->getSingleUser($_POST['contact_number']);
	       //	print_r(count($checking_user2));

        	if($checking_user->user_id == null )
        	{
        	   $response['success']=false;
        	   $response['message']= "Sorry !!! no records found";
        	}
        	else
        	{
        		$checking_user2 = $db->getSingleUser($_POST['contact_number']);
				if($checking_user2->user_id == null )
        		{
        	   		$response['success']=false;
        	   		$response['message']= "Sorry !!! no records found";
        		}
        		else
        		{
					$response['success']=true;
        			$response['message']= "Congratulation !!! records found successfully";
        			$response['user_data'] = $checking_user2;
        		}
        	}
      
			
			
			$db->closeDBConnection();
			echo json_encode($response);    	
	   }
	   else 
	   {
	   		$response['success']=false;
			$response['message']='Contact number is required.';	
			echo json_encode($response);
	   }
	}
	else
	{
		$response['success']=false;
		$response['message']='Invalid Request.';

		echo json_encode($response);
	}


?>

	 