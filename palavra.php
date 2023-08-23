<?php
    print("Escreva a frase:");
    $phrase = readline();
    
    $words = explode(" ", $phrase);
    
    print("Posição da palavra (começe por 1): ");
    $pos = readline();
    
    
    $word = $words[$pos-1];
    $vowels = array("a", "e", "i", "o", "u");
    $frase = str_replace($vowels, "x", $word);
    
    print($frase);
?>