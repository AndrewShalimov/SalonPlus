<?php

date_default_timezone_set('Europe/Kiev');

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
$accessLogFileName = "data/access.log";

function countVisitor() {
    $stat = unserialize( file_get_contents($GLOBALS["fileName"]));
    if (!$stat) {
        $stat = new Statistics();
    }
    $stat -> visitorsCount++;

    $visit = new Visit($_SERVER['REMOTE_ADDR'], new DateTime());
    array_push($stat -> visits, $visit);

    file_put_contents($GLOBALS["fileName"], serialize($stat));
  //  echo "visitors:";
//    echo $stat -> visitorsCount;
    accessLog();
}

function getStat() {
    $stat = unserialize(file_get_contents($GLOBALS["fileName"]));
//    usort($stat->visits, function($a, $b) {
//        return $a->date - $b->date;
//    });

    usort($stat->visits, 'date_compare');
    return $stat;
}

function date_compare($a, $b) {
    $t1 = strtotime($a->date->format('Y-m-d H:i:s'));
    $t2 = strtotime($b->date->format('Y-m-d H:i:s'));
    return $t2 - $t1;
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

function accessLog() {
    $method = $_SERVER['REQUEST_METHOD'];
    $time = date("M j G:i:s Y");
    $ip = getenv('REMOTE_ADDR');
    $referrer = getenv('HTTP_REFERER');
    $query = getenv('QUERY_STRING');
    $userAgent = getenv('HTTP_USER_AGENT');

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $logLine = $ip . " " . "[" . $time . "]"." ".$method." ".$actual_link . "  " . $referrer." ".$query." ".$userAgent;
    $content = file_get_contents($GLOBALS["accessLogFileName"]);
    $content = $content . "\n" . $logLine;
    file_put_contents($GLOBALS["accessLogFileName"], $content);
}

function getAccessLogContent() {
    return file_get_contents($GLOBALS["accessLogFileName"]);
}

function accessLog_() {
    //ASSIGN VARIABLES TO USER INFO
    $time = date("M j G:i:s Y");
    $ip = getenv('REMOTE_ADDR');
    $userAgent = getenv('HTTP_USER_AGENT');
    $referrer = getenv('HTTP_REFERER');
    $query = getenv('QUERY_STRING');


    //COMBINE VARS INTO OUR LOG ENTRY
    $msg = "IP: " . $ip . " TIME: " . $time . " REFERRER: " . $referrer . " SEARCHSTRING: " . $query . " USERAGENT: " . $userAgent;
    echo($msg);
    //CALL OUR LOG FUNCTION
    writeToLogFile($msg);
}

function writeToLogFile($msg) {
    $today = date("Y_m_d");
    $logfile = $GLOBALS["accessLogFileName"] . "/" . $today . "_log.txt";
    $dir = 'logs';
    $saveLocation = $dir . '/' . $logfile;
    if (!$handle = @fopen($saveLocation, "a")) {
        exit;
    } else {
        if (@fwrite($handle, "$msg\r\n") === FALSE) {
            exit;
        }

        @fclose($handle);
    }
}

?>