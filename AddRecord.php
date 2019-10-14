<?php 
	
	include_once 'DBOperation.php';
	require_once 'connection.php';
	 
    $sss = $_POST['name'];

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
       if (isset($sss) && isset($_POST['contact_no']) && isset($_POST['address']) )
       {

   			$db = new DbOperation();
	      	$isInserted = $db->AddRecord($_POST['name'], $_POST['contact_no'], $_POST['address']);

	      	if($isInserted != false)
	      	{
		    
		      	$response['success']=true;
	        	$response['message']= "Congratulation !!! Record added successfully";

	      	}
	      	else
	      	{
	      	   $response['success']=false;
        	   $response['message']= "Sorry !!! Record adding failed";
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

