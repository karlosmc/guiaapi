<?php
function debug_pre($data,$die=TRUE){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	if ($die==TRUE){
		die;
	}
}