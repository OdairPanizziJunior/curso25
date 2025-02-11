<?php
require '../vendor/autoload.php';  // Corrigir o caminho para o autoload.php


use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;  // Importa o nível de correção alto

// Defina o conteúdo do QR Code
$data = 'https://odairpanizzijunior.github.io/Personal/';

// Crie o QR Code
$qrCode = new QrCode($data);
$qrCode->setSize(300);
$qrCode->setMargin(10);
$qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh());  // Passa o objeto de nível de correção

// Crie o escritor de PNG
$writer = new PngWriter();

// Gerar a imagem do QR Code como uma string
$imageData = $writer->write($qrCode);  // Gera a imagem em formato PNG

// Salvar a imagem gerada em um arquivo
file_put_contents('qrcode.png', $imageData->getString());  // Salva o arquivo PNG

// Exibir o QR Code diretamente no navegador
echo '<img src="qrcode.png" />';
?>
