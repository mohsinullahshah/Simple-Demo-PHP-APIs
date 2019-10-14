<?php 
	
	include_once 'DBOperation.php';
	require_once 'connection.php';
	 
  

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
       if (isset($_POST['id']) )
       {

   			$db = new DbOperation();
	      	$isDelete = $db->DeleteRecord($_POST['id']);

	      	if($isDelete != false)
	      	{
		    
		      	$response['success']=true;
	        	$response['message']= "Congratulation !!! Record Deleted Successfully";

	      	}
	      	else
	      	{
	      	   $response['success']=false;
        	   $response['message']= "Sorry !!! Record Deletion failed";
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

