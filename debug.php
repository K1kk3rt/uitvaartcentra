<?php

class debug
{

    static function EchoVar($var)
    {
        echo ($var);
    }

    static function LogVarToFile($var)
    {
        $file = 'debugger.txt';

        //get timestamp
        // something like: Monday 8th of August 2005 03:12:46 PM
        $date =  date('l jS \of F Y h:i:s A');

        //open the file to get existing content
        $current = file_get_contents($file);

        // Append a new person to the file
        $current .= "\n" . $date . "\n" . (string)$var . "\n";

        // Write the contents back to the file
        file_put_contents($file, $current);
    }

    static function LogArrayToFile($array)
    {
        $file = 'debugger.txt';

        //get timestamp
        // something like: Monday 8th of August 2005 03:12:46 PM
        $date =  date('l jS \of F Y h:i:s A');

        //convert array to string\
        $string = implode(", ", $array);

        //open the file to get existing content
        $current = file_get_contents($file);

        // Append a new log to the file
        $current .= "\n" . $date . "\n" . $string . "\n";

        // Write the contents back to the file
        file_put_contents($file, $current);
    }
}
