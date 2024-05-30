<?php

require_once "vendor/autoload.php";

use ChainOfResponsibility\ProcessarParaEmpresasComUmAnexo;
use ChainOfResponsibility\ProcessarParaEmpresasComUmCnae;
use ChainOfResponsibility\ProcessarParaEmpresasComVariosCnaes;

$processarParaEmpresasComUmCnae = new ProcessarParaEmpresasComUmCnae();
$processarParaEmpresaComUmAnexo = new ProcessarParaEmpresasComUmAnexo();
$processarParaEmpresasComVariosCnaes = new ProcessarParaEmpresasComVariosCnaes();

$processarParaEmpresasComUmCnae->setNext($processarParaEmpresaComUmAnexo);
$processarParaEmpresaComUmAnexo->setNext($processarParaEmpresasComVariosCnaes);

$notaFiscal1 = [
    'temApenasUmCnae' => true,
    'temApenasUmAnexo' => false,
    'temVariosCnaes' => false,
    'leiComplementar' => false,
];

$processarParaEmpresasComUmCnae->handle($notaFiscal1);

$notaFiscal2 = [
    'temApenasUmCnae' => false,
    'temApenasUmAnexo' => true,
    'temVariosCnaes' => false,
    'leiComplementar' => false,
];

$processarParaEmpresasComUmCnae->handle($notaFiscal2);

$notaFiscal3 = [
    'temApenasUmCnae' => false,
    'temApenasUmAnexo' => false,
    'temVariosCnaes' => true,
    'leiComplementar' => true,
];

$processarParaEmpresasComUmCnae->handle($notaFiscal3);

$notaFiscal4 = [
    'temApenasUmCnae' => false,
    'temApenasUmAnexo' => false,
    'temVariosCnaes' => true,
    'leiComplementar' => false,
];

$processarParaEmpresasComUmCnae->handle($notaFiscal4);

$notaFiscal5 = [
    'temApenasUmCnae' => false,
    'temApenasUmAnexo' => false,
];

$processarParaEmpresasComUmCnae->handle($notaFiscal5);

