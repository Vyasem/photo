<?php
	//���������� ���� ���������� �� ������ ��
	require_once("model/db.php");
	
	
	$content = contact_page();
    
	 if(count($_POST) > 0)
	 {
	      if($_POST['name'] == null)
	      {
	           $er_name = "�� �� ����� ���! ������� ���������� ���� ���";
		  }
		  else
		  {
			    $save_name = $_POST['name'];
		  }
		  if($_POST['mail'] == null)
		  {
			   $er_email = "�� �� ����� ��� �������� �����! ������� ���������� ��� �������� �����";
		  }
		  else
		  {
			    $save_mail = $_POST['mail'];
		  }
		  if($_POST['text'] == null)
		  {
			   $er_text = "������ �� ������ ���� �������!";
			  
		  }
		  else
		  {
			  $save_text = $_POST['text'];
		  }
		  if(isset($er_name) || isset($er_email) || isset($er_text))
		  {
			   include 'pages/contact_page.php';
			   die();	   
		  }
		  else
		  {
			   $to = "vyasem@gmail.com";
			   $subject = "������ �� ���������� �����";
			   $message = $_POST['text'];
			   $tmp = $_POST['mail'];
			   $headers = 'From: ' . $tmp;
			   mail($to, $subject, $message, $headers);
			   header('location: contact.php');
		  }
		 
	 }
	
    
	//���������� ������� �������
	include 'pages/contact_page.php';
    

?>