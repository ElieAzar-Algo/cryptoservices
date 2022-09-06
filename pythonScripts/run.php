<?php 

function execpy()
{

    // $command=escapeshellcmd('python3 ./AIPrediction.py');
    // $output = shell_exec($command);
    $output = exec('python3 ./AIPrediction.py');
    $output_array = json_decode($output);
    echo 'helloo';
    echo $output_array;
   
}

 execpy();
