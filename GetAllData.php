<?php 
	
	include_once 'DBOperation.php';
	require_once 'connection.php';
	 
  

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
         $db = new DbOperation();
         $get_all_data = $db->GetAllData();
		    
		 $response['success']=true;
	     $response['message']= "Congratulation !!! Data fetch successfully";
	     $response['full_info']= $get_all_data;
		
		 $db->closeDBConnection();
		 echo json_encode($response);  
	}
	else
	{
		$response['success']=false;
		$response['message']='Invalid Request.';

		echo json_encode($response);
	}


?>

