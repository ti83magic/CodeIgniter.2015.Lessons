<?php

/*
 * V2, Anthony Woudenberg
 */

function table_open($nCols = 0) {
    $ret = "\n\n<table>\n    <thead>\n        <tr>\n";

    for ($i = 0; $i < $nCols; $i++) {
        $ret.=table_data("");
    }

    $ret.="        </tr>\n    </thead>\n    <tbody>\n";

    return $ret;
}

function table_close() {
    return "    </tbody>\n</table>\n\n";
}

function table_row_open() {
    return "        <tr>\n";
}

function table_row_close() {
    return "        </tr>\n";
}

function table_row($data = "") {
    return "    <tr><td>$data</td></tr>\n";
}

function table_data($data = "") {
    return "            <td>$data</td>\n";
}

// Make a table row with a td for each object in $data. If $data is not an
// array, make a row with one td element. 
function table_output($tr = NULL) {
    
    if (is_null($tr)) {
        return;
    }

    if (!is_array($tr)) {
        echo table_row($tr);
    } else {
        echo table_row_open();

        foreach ($tr as $td) {
            echo table_data($td);
        }

        echo table_row_close();
    }
}
