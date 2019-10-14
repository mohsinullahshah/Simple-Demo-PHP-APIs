<?php 
	
	include_once 'DBOperation.php';
	require_once 'connection.php';
	 
  

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
       if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['contact_no']) && isset($_POST['address']) )
       {

   			$db = new DbOperation();
	      	$isUpdated = $db->UpdateRecord($_POST['id'], $_POST['name'], $_POST['contact_no'], $_POST['address']);

	      	if($isUpdated != false)
	      	{
		    
		      	$response['success']=true;
	        	$response['message']= "Congratulation !!! Record Updated Successfully";

	      	}
	      	else
	      	{
	      	   $response['success']=false;
        	   $response['message']= "Sorry !!! Record Updation failed";
	      	}
	        
      
			
			$db->closeDBConnection();
			echo json_encode($response);    	
	   }
	   else 
	   {
	   		$response['success']=false;
			$response['message']='Please provide all the values';	
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

