<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;



$documento = '<!DOCTYPE html>
		<html>
		 <head>
		  <title>Teste</title>		
		 </head>
		 <body>
		  <div class="content">
		   <br><br><br>
		   <p>TIAGO aceitou o Código de etica em 10/10/2023 ás 18:00</p>
		  </div>
		 </body>
		</html>';





//**************************************************************************************************

$nome = "Tiago";

$options = new Options();

$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);


$dompdf->loadHtml($documento);
$dompdf->setPaper('A4', 'landscape');


$canvas = $dompdf->getCanvas();

// Render HTML para PDF
$dompdf->render();

// Nome do arquivo PDF gerado
$nomeArquivo = $nome . '.pdf';

// Caminho para a pasta onde você deseja salvar o arquivo PDF
$pastaDestino = 'documentos/';

// Verifica se a pasta de destino existe, senão cria
if (!is_dir($pastaDestino)) {
	mkdir($pastaDestino, 0755, true);
}

// Caminho completo para o arquivo PDF
$caminhoArquivo = $pastaDestino . $nomeArquivo;

// Salva o arquivo PDF na pasta de destino
file_put_contents($caminhoArquivo, $dompdf->output());




$mensagem        = "<p>Olá,  {$nome}.</p>
		                    <p>Segue o seu documento assiando  <a href='https://www5.pe.senac.br/.../{$nomeArquivo}'>clique aqui</a></p>";
