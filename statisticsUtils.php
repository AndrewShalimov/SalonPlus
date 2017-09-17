<?php


class Statistics {
    public $visitorsCount = 0;
    public $visits = [];
}

class Visit {
    public $hostAddress;
    public $date;

    public function __construct($hostAddress, $date) {
        $this->hostAddress = $hostAddress;
        $this->date = $date;
    }
}

$fileName = "data/stat";

function countVisitor() {
    $stat = unserialize( file_get_contents($GLOBALS["fileName"]));
    if (!$stat) {
        $stat = new Statistics();
    }
    $stat -> visitorsCount++;

    $visit = new Visit($_SERVER['REMOTE_ADDR'], new DateTime());
    array_push($stat -> visits, $visit);
  //  echo "visitors:";
//    echo $stat -> visitorsCount;
    file_put_contents($GLOBALS["fileName"], serialize($stat));
}

function getStat() {
    $stat = unserialize( file_get_contents($GLOBALS["fileName"]));
    echo "visitors:";
    echo $stat -> visitorsCount, "<br>";
    for ($i = 0; $i < sizeof($stat -> visits); $i++) {
        echo "address: ",
             $stat -> visits[$i] -> hostAddress,
             ", date: ",
             $stat -> visits[$i] -> date->format('Y-m-d H:i:s'),
             "<br>";
    }
}

//getStat();

function writeWithLock() {
    $fp = fopen("counter.txt", "r+");

    while(!flock($fp, LOCK_EX)) {  // acquire an exclusive lock
        // waiting to lock the file
    }

    $counter = intval(fread($fp, filesize("counter.txt")));
    $counter++;

    ftruncate($fp, 0);      // truncate file
    fwrite($fp, $counter);  // set your data
    fflush($fp);            // flush output before releasing the lock
    flock($fp, LOCK_UN);    // release the lock

    fclose($fp);
}
?>