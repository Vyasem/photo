<?php
	//Подключаем файл отвечающий за работу БД
	require_once("model/db.php");
	
	
	$content = contact_page();
    
	 if(count($_POST) > 0)
	 {
	      if($_POST['name'] == null)
	      {
	           $er_name = "Вы не ввели имя! Введите пожалуйста ваше имя";
		  }
		  else
		  {
			    $save_name = $_POST['name'];
		  }
		  if($_POST['mail'] == null)
		  {
			   $er_email = "Вы не ввели ваш почтовый адрес! Введите пожалуйста ваш почтовый адрес";
		  }
		  else
		  {
			    $save_mail = $_POST['mail'];
		  }
		  if($_POST['text'] == null)
		  {
			   $er_text = "Письмо не должно быть пустным!";
			  
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
			   $subject = "Письмо от посетителя сайта";
			   $message = $_POST['text'];
			   $tmp = $_POST['mail'];
			   $headers = 'From: ' . $tmp;
			   mail($to, $subject, $message, $headers);
			   header('location: contact.php');
		  }
		 
	 }
	
    
	//Подключаем главную страниц
	include 'pages/contact_page.php';
    

?>