<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// -----------------------------------------------------------------------------
// Project:     CodeIgniter.2015.Lessons
// Bestand:     Table.php
// 
// Gemaakt op:  4-nov-2015 14:08:34
// Auteur:      Anthony Woudenberg
//              Toegepaste Informatica
//              Thomas More Kempen
// 
// Samenvatting: 
// -------------
// Bundelt een aantal functies om tabellen mee te maken. Dit was eerst een
// helper, maar is inmiddels uitgebreid naar zijn eigen libraryclass, vooral
// vanwege de indentatie die bijgehouden wordt.
// -----------------------------------------------------------------------------


class Table {

    private $level = 0;
    private $spacer = '    ';
    
    public function setLevel($level) {
        if($level>=0) {
            $this->level = $level;
        }
    }

        public function setSpacer($spacer) {
        if(is_string($spacer)) {
            $this->spacer = $spacer;
        }
    }


    // Maakt een volledige tabel. Als er een object wordt doorgegeven als $data,
    // dan wordt er een tabel gemaakt met als headers de members van dat object, en 
    // de inhoud van die members als data. Wordt er een array van objecten
    // doorgegeven, dan wordt elk van die objecten op die manier als rij getoond.
    // headers: "kolom|kolom2" of array("kolom","kolom2");
    //
    // TODO: English comments    
    function create($data, $headers = null, $fields = null) {

        // $data moet een array worden, ook als het maar 1 element is.
        // Moet makkelijker kunnen, maar casten werkte niet lekker.
        if (is_object($data)) {
            $temp = $data;
            unset($data);
            $data[0] = $temp;
        }

        $headers = $this->prepareParameters($headers, $data);
        $fields = $this->prepareParameters($fields, $data);
        
        // Open de tabel, met de juiste headers.
        $ret = $this->open($headers);

        // voor elk element in $data, druk alle velden uit $fields af.
        foreach ($data as $entry) {
            $ret .= $this->rowOpen();
            
            foreach ($fields as $field) {
                $ret .= $this->data($this->getWaardeVanMember($entry, $field));
            }
            $ret .= $this->rowClose();
        }

        $ret .= $this->close();

        return $ret;
    }

    // Opent een tabel, inclusief alle members van object $data als headers. Is
    // $data een array, dan worden de waarden uit die array als headers gebruikt. 
    public function open($data = null) {
        $ret = "\n\n" .
                $this->spacers(0) . "<table>\n" .
                $this->spacers(1) . "<thead>\n" .
                $this->rowOpen();

        if (is_object($data)) {
            $properties = array_keys(get_object_vars($data));

            foreach ($properties as $property) {
                $ret .= $this->head($property);
            }
        } else if (is_array($data)) {
            foreach ($data as $header) {
                $ret .= $this->head($header);
            }
        }

        $ret .= $this->rowClose() .
                $this->spacers(1) . "</thead>\n" .
                $this->spacers(1) . "<tbody>\n";

        return $ret;
    }

    // Closes a table.
    public function close() {
        return $this->spacers(1) . "</tbody>\n" .
                $this->spacers(0) . "</table>\n\n\n";
    }

    // Creates a row with a td for each member of $data.
    public function row($data) {
        if (!isset($data)) {
            return;
        }

        $properties = array_keys(get_object_vars($data));
        $ret = $this->rowOpen();

        foreach ($properties as $property) {
            $ret .= $this->head($data->{$property});
        }

        $ret .= $this->rowClose();

        return $ret;
    }

    // Opens a row.
    public function rowOpen() {
        return $this->spacers(2) . "<tr>\n";
    }

    // Closes a row.
    public function rowClose() {
        return $this->spacers(2) . "</tr>\n";
    }

    // Returns a data cell with $data as contents. If $data is an object or
    // array, $data will be changed to text to reflect this.
    public function data($data, $isHeader = false) {
        $mode = ($isHeader ? 'th' : 'td');

        if (is_object($data)) {
            $data = '[Object]';
        }

        if (is_array($data)) {
            $data = '[Array]';
        }

        return $this->spacers(3) . "<$mode>$data</$mode>\n";
    }

    // Was too simmilar to data(), but still here for completeness.
    public function head($data) {
        return $this->data($data, true);
    }

    // Returns n spacers, where n is $level if $isAbsolute is true. If not, n
    // equals $this->level + $level.
    private function spacers($level, $isAbsolute = false) {
        $ret = '';

        for ($i = 0; $i < ($isAbsolute ? $level : $this->level + $level); $i++) {
            $ret.=$this->spacer;
        }

        return $ret;
    }

    // When this class is used to generate an automatic table, one of the
    // options is an array of members you want to display. This functions allows
    // for those members to be nested within objects, such as
    // product->category->name. This function returns (recursively) the value
    // of the last member in that chain (here, name).
    //
    // TODO: There is no errorchecking on this function yet.
    private function getWaardeVanMember($obj, $memberKeten) {
        $members = explode("->", $memberKeten);

        if (count($members) == 1) {
            return($obj->{$memberKeten}); //Geen objecten meer, klaar.
        } else {
            $obj = $obj->{array_shift($members)}; // Maak van de eerste member een object...
            $memberKeten = implode('->', $members); // ...en van de overige members weer een keten.

            return $this->getWaardeVanMember($obj, $memberKeten); // Roep vervolgens deze functie opnieuw op.
        }
    }

    private function prepareParameters($config, $data) {
        if ($config == null) {
            $config = array_keys(get_object_vars(reset($data)));
        }

        if (is_string($config)) {
            $config = explode('|', $config);
        }
        
        return $config;
    }
}

/* End of file Table.php */
