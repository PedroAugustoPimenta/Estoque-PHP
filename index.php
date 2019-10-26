<?php

	include("Produto.php");
	include("Perecivel.php");
	include("DVD.php");
	include("Leite.php");

	$quantidadeDVD = 0;
	$quantidadeVencido = 0;
	$jsonArrayDVD = array();
	$jsonArrayLeite = array();
	$jsonArray = array();
	$total = 0.0;

	$DVD1 = array(
		'codigo' => 1,
		'preco' => 5.90,
		'titulo' => 'As tranças do rei careca',
		'ano' => 1999
	);
	$DVD2 = array(
		'codigo' => 2,
		'preco' => 5.90,
		'titulo' => 'A volta dos que não foram',
		'ano' => 1998
	);
	$DVD3 = array(
		'codigo' => 3,
		'preco' => 5.90,
		'titulo' => 'Poeira em alto mar',
		'ano' => 1997
	);
	$DVD4 = array(
		'codigo' => 4,
		'preco' => 5.90,
		'titulo' => 'Meu tio é filho único',
		'ano' => 1996
	);
	$Leite1 =array(
		'codigo' => 5,
		'preco' => 7.80,
		'marca' => 'Itambé',
		'volume' => 1,
		'dataValidade' =>  $data=new DateTime("21-05-2022")
	);
	$Leite2 =array (
		'codigo' => 6,
		'preco' => 7.50,
		'marca' => 'Camponesa',
		'volume' => 1,
		'dataValidade' =>  $data=new DateTime("11-08-2023")
	);
	$Leite3 = array(
		'codigo' => 7,
		'preco' => 8.50,
		'marca' => 'Parmalat',
		'volume' => 1,
		'dataValidade' =>  $data=new DateTime("18-08-2022")
	);
	$Leite4 = array(
		'codigo' => 8,
		'preco' => 8.30,
		'marca' => 'Piracanjuba',
		'volume' => 1,
		'dataValidade' =>  $data=new DateTime("23-07-2021")
	);
	$Leite5 = array(
		'codigo' => 9,
		'preco' => 8.40,
		'marca' => 'Ninho',
		'volume' => 1,
		'dataValidade' =>  $data=new DateTime("07-02-2019")
	);
	$Leite6 =array(
		'codigo' => 10,
		'preco' => 7.90,
		'marca' => 'Batavo',
		'volume' => 1,
		'dataValidade' =>new DateTime("05-12-2018")
	);

	$estoque = array(
		new DVD($DVD1),
		new DVD($DVD2),
		new DVD($DVD3),
		new DVD($DVD4),
		new Leite($Leite1),
		new Leite($Leite2),
		new Leite($Leite3),
		new Leite($Leite4),
		new Leite($Leite5),
		new Leite($Leite6)
	);

	foreach ($estoque as $item) {
		$aux = (array) $item;
		if ($item instanceof DVD) {
			if ($item->buscarDVD($item)) {
				$quantidadeDVD++;
				array_push($jsonArrayDVD, $aux);
			}
		}  else if ($item instanceof Leite) {
			if ($item->vencido($item)) {
				$quantidadeVencido++;
				array_push($jsonArrayLeite, $aux);
			}
		}
		array_push($jsonArray, $aux);
		$total += $item->getPreco();
	}

	println("DVDs lançados em 1998: ".$quantidadeDVD);
	println("Quantidade de leites vencidos: ".$quantidadeVencido);
	println("Valor total do estoque: R$".$total);
	println("");

	echo "DVDs lançados em 1998:";
	$json = json_encode($jsonArrayDVD, JSON_PRETTY_PRINT);
	$json = str_replace("\\u0000", "", $json);
	$json = str_replace("\\u00e3", "ã", $json);
	echo "<pre>";
	print_r($json);
	echo "</pre>";

	echo "Quantidade de leites vencidos: ";
	$json = json_encode($jsonArrayLeite, JSON_PRETTY_PRINT);
	$json = str_replace("\\u0000", "", $json);
	$json = str_replace("\\u00e3", "ã", $json);
	echo "<pre>";
	print_r($json);
	echo "</pre>";

	echo "Todos os produtos do estoque:";
	$json = json_encode($jsonArray, JSON_PRETTY_PRINT);
	$json = str_replace("\\u0000", "", $json);
	$json = str_replace("\\u00e3", "ã", $json);
	$json = str_replace("\\u00e7", "ç", $json);
	$json = str_replace("\\u00e9", "é", $json);
	$json = str_replace("\\u00fa", "ú", $json);
	echo "<pre>";
	print_r($json);
	echo "</pre>";

	function println($msg) {
		echo $msg."<br>";
	}
?>