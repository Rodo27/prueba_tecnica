<?php

    // Prueba Técnica

    /*

        El la siguiente función determina si una cadena que contine los siguientes carácteres '{', '[' , '(' , ')' , ']', '}' es válida. 
        Una cadena es válida si contine caracteres de apertura y cierre de un mismo tipo en el mismo nivel,
        por ejemplo :
        
        "[]" o "{}" o "()" : Es válida y son las cadenas más simples.
        "[{]" : No es válida.
        "{[]" : No es válida.
        "[{()}]": Es válida.
    */


    // Main function

    function validateString(string $myString){

        $chars = [];  // Usaremos el arreglo como pila (stack)

        $myString = str_split($myString); // convertimos la cadena a un array 

        for($i = 0; $i < count($myString); $i++){ // iteramos el array 

            if($myString[$i] == '(' || $myString[$i] == '[' || $myString[$i] == '{')  // revisamos si el carácter es de apertura 
                array_push($chars, $myString[$i]);  // agregamos a la pila
            else if ($myString[$i] == ')' && count($chars) != 0 && $chars[count($chars)-1] == '(') // revisamos si el carácter es de cierre, que no sea la posición 0 del array y si en la pila se encuentra su carácter de apertura
                array_pop($chars);
            else if ($myString[$i] == ']' && count($chars) != 0 && $chars[count($chars)-1] == '[')
                array_pop($chars);
            else if($myString[$i] == '}' && count($chars) != 0 && $chars[count($chars)-1] == '{')
                array_pop($chars);
            else
                return false;
        }

        return count($chars) == 0; // devolvemos un boolean
        
    }

    // Reutilizando la función anterior podemos validar arreglos de cadenas, simplente iterando

    function validateArrayOfStrings(array $arrayOfStrings){

        $results = [];

        foreach($arrayOfStrings as $array)
            array_push($results,validateString($array));

        return $results;
    }


    $test1 = ["}[{]{"];
    $test2 = ["[{}]"];
    $test3 = ["[{}]","}[{]{"];
    $test4 = ["[{}]","}[{]{","{[()]}"];

    var_dump(validateArrayOfStrings($test1));
    var_dump(validateArrayOfStrings($test2));
    var_dump(validateArrayOfStrings($test3));
    var_dump(validateArrayOfStrings($test4));




