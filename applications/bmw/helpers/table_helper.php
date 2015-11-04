<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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

function table_data($contents) {
    return "            <td>$contents</td>\n";
}
