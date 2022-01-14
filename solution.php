<?php

/*
 * Complete the 'bomberMan' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. STRING_ARRAY grid
 */

/**
 * @param $n
 * @param $grid
 * @return array|mixed|string[]
 */
function bomberMan($n, $grid) {
    if($n == 1) return $grid;

    $r = sizeof($grid);
    $c = strlen($grid[0]);
    if($n % 2 == 0) return array_fill(0, $r, str_repeat('O', $c));

    $grid = array_map(function($row){ return str_split($row); }, $grid);

    $grid = detonate($grid, $r, $c);

    if($n % 4 == 1) {
        $grid = detonate($grid, $r, $c);
    }

    return array_map(function($row){ return implode("", $row); }, $grid);
}

/**
 * @param $grid
 * @param $r
 * @param $c
 * @return array
 */
function detonate($grid, $r, $c){
    $init = array_fill(0, $r, str_split(str_repeat('O', $c)));
    for($i = 0; $i < $r; $i++){
        for($j = 0; $j < $c; $j++){
            if($grid[$i][$j] == 'O') {
                $init[$i][$j] = '.';
                if(isset($grid[$i][$j - 1])){
                    $init[$i][$j - 1] = '.';
                }
                if(isset($grid[$i - 1][$j])){
                    $init[$i - 1][$j] = '.';
                }
                if(isset($grid[$i][$j + 1])){
                    $init[$i][$j + 1] = '.';
                }
                if(isset($grid[$i + 1][$j])){
                    $init[$i + 1][$j] = '.';
                }
            }
        }
    }
    return $init;
}
