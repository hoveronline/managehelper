<?php
function get_rand($data){
	$array = explode(':',$data);
	
	switch($array[0]){
		case 'number':
		case 'num':
		case 'n':
			return mt_rand(explode('-',$array[1])[0],explode('-',$array[1])[1]);
		break;
		case 'IP':
		case 'ip':
			return  "'".str_replace('m',mt_rand(1,254), str_replace('n',mt_rand(1,254),$array[1]))."'" ;
		break;
		case 'date':
			return  str_replace('m',mt_rand(1,12), str_replace('d',mt_rand(1,27),$array[1])) ;
		break;
		case 'option':
			return  "'".explode('|',$array[1])[mt_rand(0,1)]."'" ;
		break;
		case 'name':
			return  explode('|',$array[1])[mt_rand(0,1)].mt_rand(0,100000) ;
		break;
		default:
			return explode('|',$array[1])[mt_rand(0,1)].mt_rand(0,100000);
		break;
	}
}
?>