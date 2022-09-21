<?php

function debuguear($variable): string
{
    print_r($_GET);
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

//funcion que revisa que el usaurio esta identificado
function isAuth(): void
{
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function esUltimo(string $actual, string $proximo)
{

    if ($actual !== $proximo)
        return true;
    else
        return false;
}

function isAdmin():void{
    if(!isset($_SESSION['admin'])){
        header('Location: /'); 
    }
}