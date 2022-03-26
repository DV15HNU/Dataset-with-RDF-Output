<?php

include_once 'dataclass.php';

class datacontext
{
    public function data_class()
    {
        $highway = [];
        $headers = [];

        $file = fopen('../assets/dataset.csv','r');
        if($file)
        {
            $lineCount = 0;

            while($data = fgetcsv($file, 1000, ","))
            {

                if ($lineCount > 0) {
                    $ds = new dataclass($data[0], $data[1], $data[2], $data[3], $data[4] );
                    $highway[] = $ds;
                    $lineCount++;
                }
                else
                {
                    $headers = $data;
                    $lineCount++;
                }
            }
        }
        return $highway;

    }
}