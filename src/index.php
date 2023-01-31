<?php

// $argv コマンドラインから実行したときに、 現在のスクリプトに渡されたすべての引数の配列が含まれます
// $argc コマンドラインから実行したときに、 現在のスクリプトに渡された引数の数が含まれます

foreach ($argv as $key => $v) {
    if ($key == 0) {
        continue;
    }
    $array[] = $v;

}

var_dump($array);
