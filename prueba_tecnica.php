<?php

    // Prueba Técnica

    function validateString(string $myString){

        $chars = [];
        $myString =str_split($myString); 

        for($i = 0; $i < count($myString); $i++){

            if($myString[$i] == '(' || $myString[$i] == '[' || $myString[$i] == '{')
                array_push($chars, $myString[$i]);
            else if ($myString[$i] == ')' && count($chars) != 0 && $chars[count($chars)-1] == '(')
                array_pop($chars);
            else if ($myString[$i] == ']' && count($chars) != 0 && $chars[count($chars)-1] == '[')
                array_pop($chars);
            else if($myString[$i] == '}' && count($chars) != 0 && $chars[count($chars)-1] == '{')
                array_pop($chars);
            else
                return false;
        }

        return count($chars) == 0;
        
    }

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
    


