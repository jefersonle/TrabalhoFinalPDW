<html>

	<form action ="" method="post" >
            Primeiro Numero: <input name="a" type="text" />
            Segundo numero: <input name="b" type="text" /> 
            Selecione a operação:  <select name="operacao">
            	<option value="selecione">...</option>
                <option value="subtracao">SUBTRAÇÃO</option>
                <option value="soma">ADIÇÃO</option>
                <option value="divisao">DIVISÃO</option>
                <option value="multiplicacao">MULTIPLICAÇÃO</option>
            </select>     
            <input type="submit" value="Publicar" />
    </form> 


<?php

if ($_SERVER["REQUEST_METHOD"]== "POST") {
		$a = $_POST["a"];
        $b = $_POST["b"];
        $opcao =$_POST["operacao"];

    $client = new SoapClient(null, array(
		'location' => 'http://localhost/tormen/trabalhofinal/webserviceserver.php',  // ex.: http://localhost/soap/server.php
		'uri' => 'http://localhost/tormen/trabalhofinal',  				// ex.: http://localhost/soap/
		'trace' => 1));

	// chamada do servico SOAP
	$result = $client->publicar($a, $b, $opcao);

	// verifica erros na execucao do servico e exibe o resultado
	if (is_soap_fault($result)){
		trigger_error("SOAP Fault: (faultcode: {$result->faultcode},
		faultstring: {$result->faulstring})", E_ERROR);
	}else{
		echo $result;
	}

}
?>
