
<?php

function eachbut()
{

    $MyString = $_POST['dromeinput'];
    $revString = strrev($MyString);


    if ($revString == $MyString) {
        echo $MyString . " is a Palindrome.\n";
    } else {
        echo $MyString . " is not a Palindrome.\n";
    }
}
function whilebut()
{

    $MyString = $_POST['dromeinput'];

    $l = 0;
    $r = strlen($MyString) - 1;
    $flag = 0;

    while ($r > $l) {
        if ($MyString[$l] != $MyString[$r]) {
            $flag = 1;
            break;
        }
        $l++;
        $r--;
    }

    if ($flag == 0) {
        echo $MyString . " is a Palindrome.\n";
    } else {
        echo $MyString . " is not a Palindrome.\n";
    }
}
function forbut()
{
    $MyString = $_POST['dromeinput'];
    $ouput = '';
    $input = strlen($MyString) - 1;

    for ($x = $input; $x >= 0; $x--) {
        $ouput .= $MyString[$x];
    }

    if ($ouput == $MyString) {
        echo $MyString . " is a Palindrome.\n";
    } else
        echo $MyString . " is not a Palindrome.\n";
}
