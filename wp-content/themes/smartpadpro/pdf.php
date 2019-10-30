<?php
session_start();
if(isset($_POST['form_action']) && ($_POST['form_action'] == "confirmation_section"))
{
	echo $_SESSION['confirmation_section'] = 1;
	exit;	
}
if(isset($_SESSION['confirmation_section']) && ($_SESSION['confirmation_section'] == 1))
{
	$data=  $_SESSION['html_data'];
	$root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
	
	require_once __DIR__ . '/vendor/autoload.php';
	if( (isset($_SERVER['HTTP_HOST'])) && ($_SERVER['HTTP_HOST'] == "localhost") )
	{
		$root_url = $root_url.'/smart-pad-pro-websites/';		
	}
	
	$_SESSION['confirmation_section'] = 0;
$mpdf = new mPDF();
$mpdf->WriteHTML('<style media="print">
    div { 
        color: black; 
    }
	.cf7-step-confirm-title
	{
		font-size : 20px;
		margin-bottom : 10px;
		margin-top : 10px;
		border-bottom : 1px solid black;
	}
	.cf7-step-confirm-name
	{
		display : table-column;
		text-align : left;
		float : left;
		width : 250px;
		padding : 10px 0;
	}
	.cf7-step-confirm-value
	{
		display:table-column;
		text-align : left;
		float : left
		width : 250px;padding : 10px 0;
	}
	.cf7-container-step-confirm
	{
		display : table;
	}
	.header
	{
		background : black;	
		text-align : left;
		margin-bottom : 20px;
	}
	.hide_section
	{
		display : none;
	}
</style><div class="cf7-container-step-confirm"><div class="header"><img src="'.$root_url.'wp-content/uploads/2019/05/logo_tagline.png"></div>'.$data.'</div>');
$mpdf->Output('Organisation_details.pdf','D');

}
else
{
	    header("Location: /");
}
?>