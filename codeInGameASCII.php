<?php

fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);

// LIGNE TEXT  => $T
// LARGEUR => $L
// HAUTEUR => $H

$T = stream_get_line(STDIN, 256 + 1, "\n");
$tableau = array();
$listeAlphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','?');
$result = [];
$ligne = str_split($T);

// TABLEAU AVEC TOUTES LES LIGNES DES LETTRES DE L'ALPHABET
    for ($i = 0; $i < $H; $i++)
    {
        $ROW = stream_get_line(STDIN, 1024 + 1, "\n");
        array_push($tableau, $ROW);
    }
// RECUPERATION DE LA POSITION DE LA LETTRE ASCII
    foreach($ligne as $li){
            
        if(!in_array(strtoupper($li), $listeAlphabet)){
            $li = '?';    
        }
            $intStart = 0;
            $intEnd = 0;
            $caracNumber = array_search(strtoupper($li), $listeAlphabet);
            
        // Position départ dans alphabet ASCII
            $intStart = $caracNumber * $L;
            
        // Position de fin dans alphabet ASCII
            
            if($li == "?"){
                $intEnd = ($intStart - iconv_strlen($tableau[0])) + ($L * 2);
            } else {
                $intEnd = ($intStart - iconv_strlen($tableau[0])) + $L; 
            }
            
            for($i = 0; $i < count($ligne); $i++ ){
                $tableauBidon = array();
                // AFFICHAGE AVEC LES CONDITIONS DE STRING
                    for($x = 0; $x < count($tableau); $x++){
                        array_push($tableauBidon, substr($tableau[$x], $intStart, $intEnd));
                    }
            }
        array_push($result, $tableauBidon);
    }
    
    $finalResult = '';
    
    for($a = 0; $a < $H; $a++){
        for($b = 0; $b < count($result); $b++){
            
            $finalResult .= $result[$b][$a];
            
            if($b ==  count($result) - 1){
                $finalResult.= "\n";
            }
        }    
    }
    
    echo $finalResult;
    
    
    
































?>