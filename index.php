<?php 
$_POST["imc"] = "";

if (!empty($_POST["peso"]) && (!empty($_POST["altura"]))){
	calcular_imc($_POST["peso"],$_POST["altura"]);		
}

function calcular_imc($peso,$altura){
	$_POST["imc"] = round(($peso / pow($altura,2)),2);

	$tabela = array (
		[
			'min'=> 0,
			'max'=> 18.5,
			'classificacao'=>"Magreza"
		],
		[
			'min'=>18.51,
			'max'=>24.9,
			'classificacao'=>"Saudável"
		],
		[
			'min'=>25.0,
			'max'=>29.9,
			'classificacao'=>"Sobrepeso"
		],
		[
			'min'=>30.0,
			'max'=>34.9,
			'classificacao'=>"Obesidade Grau I"
		],
		[
			'min'=>35.0,
			'max'=>39.9,
			'classificacao'=>"Obesidade Grau II"
		],
		[
			'min'=>40,
			'classificacao'=>"Obesidade Grau III"
		]);

	$contador = count($tabela) -1;
	for ($i=0; $i <= $contador ; $i++) { 
		if ($i == $contador) {
			echo "<script type='text/javascript'>alert('Atenção, seu IMC é ".$_POST["imc"].", e você está classificado como ".$tabela[$i]['classificacao']."  ');</script>"; 
			break;
		}
		if ($_POST['imc'] >= $tabela[$i]['min'] && $_POST['imc'] <= $tabela[$i]['max']) {
			echo "<script type='text/javascript'>alert('Atenção, seu IMC é ".$_POST["imc"].", e você está classificado como ".$tabela[$i]['classificacao']."  ');</script>"; 
			break;
		}
	}

}

?>

<!DOCTYPE html> 
<html> 
<head> 
	<title>Calculo IMC</title> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head> 
<body> 
  <header> 
    <h1>Calculo IMC</h1> 
  </header> 
  <main> 
    <form action="index.php" method="post"> 
      <label for="peso">Digite o seu peso:</label> 
      <input type="text" id="peso" pattern="\d{1,}\.\d{2}" name="peso" placeholder="Ex: 80.50"> 
      <br> 
      <label for="altura">Digite a sua altura:</label> 
      <input type="text" pattern="\d{1,}\.\d{2}" id="altura" name="altura" placeholder="Ex: 1.60"> 
      <br><br> 
      <input type="submit" value="Calculo"> 
    </form> 
 <p>A soma é: <?=$_POST["imc"]?></p>
  </main> 


  <script>
$(document).ready(function(){
	$("#peso").mask('##0.00',{reverse: true});
	$("#altura").mask('0.00',{reverse: true});

});
</script>

</body> 
</html>