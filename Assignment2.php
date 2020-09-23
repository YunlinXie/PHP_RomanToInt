<?php 
/** 
 * This program convert Roman number to Integer number and
 * also includes input validations provides some test cases
 * Author: Yunlin Xie
 * */

 /************************************function romanToArabic()*************************************/
function romanToArabic($roman) {
    // The following are the only valid symbols in roman, case senstive
    $map = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000
    ];
    $l = strlen($roman);
    $result = 0;

    // check if input is null or empty
    if (trim($roman)==="" || trim($roman)==='' || !isset($roman)) {
        echo "Result is invalid, ";
        return NULL;
    }
    // check if input is zero (nulla: case does not matter)
    if (strtoupper(trim($roman)) == "NULLA") {
        echo "Result is " .$result .", ";
        return 0;
    }
    // check if input include invalid symbols
    if (!isRoman($roman)) {
        echo "Result is invalid, ";
        return NULL;
    }

    // Go through the input Roman string from right to left,
    // if current symbol value is less than the previous one,
    // subtract it from the result; otherwise add it to result
    $result = $map[$roman[$l-1]];
    for($i=$l-2; $i>=0; $i--) {
        $currValue = $map[$roman[$i]];
        if($currValue < $map[$roman[$i+1]]) {
            $result -= $currValue;
        } else{
            $result += $currValue;
        }     
    }
    echo "Result is " .$result .", ";
    return $result;
}

/********************************************function isRoman()*************************************/
function isRoman($roman) {
    $roman = trim($roman);
    $l = strlen($roman);
    $romanSymbols = array("I", "V", "X", "L", "C", "D", "M");
    for ($i=0; $i<$l; $i++) {
        $currSymbol = $roman[$i];
        if (!in_array($currSymbol, $romanSymbols)) {
            return FALSE;
        }
    }
    return TRUE;
}

/*****************************************function testor()******************************************/
function testor($roman) {
    if (!isset($roman)) {
        return NULL;
    }
    if ($roman == "") {
        return NULL;
    }
    if ($roman == "nulla") {
        return 0;
    }
    if ($roman == "MD3i") {
        return NULL;
    }
    if ($roman == "MCMXC") {
        return 1990;
    }
    if ($roman == "MCMXCIV") {
        return 1994;
    }
    if ($roman == "LVIII") {
        return 58;
    }
    if ($roman == "MMCMLXXXIX") {
        return 2989;
    }
}

/*********************************************Test Cases**********************************************/
// test case 1 for null
if (romanToArabic(NULL) == testor(NULL)) {
    echo "test case 1 is passed.\n";
} else {
    echo "test case 1 is failed.\n";
}
// test case 2 for empty string
if (romanToArabic("") == testor("")) {
    echo "test case 2 is passed.\n";
} else {
    echo "test case 2 is failed.\n";
}
// test case 3 for zero (nulla: case does not matter)
if (romanToArabic("Nulla ") == testor("nulla")) {
    echo "test case 3 is passed.\n";
} else {
    echo "test case 3 is failed.\n";
}
// test case 4 for invalid symbols
if (romanToArabic("MD3i") == testor("MD3i")) {
    echo "test case 4 is passed.\n";
} else {
    echo "test case 4 is failed.\n";
}
// test case 5 for roman MCMXC = 1990
if (romanToArabic("MCMXC") == testor("MCMXC")) {
    echo "test case 5 is passed.\n";
} else {
    echo "test case 5 is failed.\n";
}
// test case 6 for roman MCMXCIV = 1994
if (romanToArabic("MCMXCIV") == testor("MCMXCIV")) {
    echo "test case 6 is passed.\n";
} else {
    echo "test case 6 is failed.\n";
}
// test case 7 for roman LVIII = 58
if (romanToArabic("LVIII") == testor("LVIII")) {
    echo "test case 7 is passed.\n";
} else {
    echo "test case 7 is failed.\n";
}
// test case 8 for roman MMCMLXXXIX = 2989
if (romanToArabic("MMCMLXXXIX") == testor("MMCMLXXXIX")) {
    echo "test case 8 is passed.\n";
} else {
    echo "test case 8 is failed.\n";
}


?> 