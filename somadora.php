<?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $num1 = $_POST["num1"]; 
    $num2 = $_POST["num2"]; 
    $soma = $num1 + $num2; 
    echo "<script type='text/javascript'>alert('A soma dos números é: $soma');</script>"; 
  } 

?>

<?php 
$_POST["imc"] = "";

if (!empty($_POST["peso"]) && (!empty($_POST["altura"]))){
	calcular_imc($_POST["peso"],$_POST["altura"]);		
}

function calcular_imc($peso,$altura){
	$_POST["imc"] = $peso / pow($altura,2);

	$tabela = {
		[
			'mim'=> 0,
			'max'=> 18.5,
			'classificacao'=>"Magreza"
			] ,
		['mim'=>18.51,'max'=>24.9,'classificacao'=>"Saudável"],
		['mim'=>25.0,'max'=>29.9,'classificacao'=>"Sobrepeso"],
		['mim'=>30.0,'max'=>34.9,'classificacao'=>"Obesidade Grau I"],
		['mim'=>35.0,'max'=>39.9,'classificacao'=>"Obesidade Grau II"],
		['mim'=>40,'classificacao'=>"Obesidade Grau III"]
	}

	for ($i=0; $i < $tabela.lenght ; $i++) { 
		if (condition) {
			# code...
		}
	}

}

/*
function somador($num1,$num2){		
	if ($_SERVER["REQUEST_METHOD"] == "POST") { 
		$_POST["soma"] = $num1 + $num2; 
		//echo "<script type='text/javascript'>alert('A soma dos números é: $soma');</script>"; 
		print_r($_POST);
		var_dump($_POST);
				
  } 
}*/

?>