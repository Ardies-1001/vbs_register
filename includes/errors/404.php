<?php
function erreur404()
{
	if ( !empty( $_SESSION['id'] ) ) 
	{
    header('location:404.php');
	} 

}