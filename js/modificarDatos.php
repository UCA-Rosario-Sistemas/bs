<?php
session_start();

			$array=$_SESSION['cart'];
			$total=0;
			$number=0;

			for ($i=0; $i < count($array) ; $i++) { 
				if ($array[$i]['Id']==$_POST['Id']) {
					$number=$i;
				}
			}
			$array[$number]['Cantidad']= $_POST['Cantidad'];
			for ($i=0; $i < count($array) ; $i++) {
				$total=$total+($array[$i]['Precio']*$array[$i]['Cantidad']);

			}

			$_SESSION['cart']=$array;
			echo $total;

?>