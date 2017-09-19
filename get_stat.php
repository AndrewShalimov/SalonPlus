<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
// I18N support information here

include_once('statisticsUtils.php');

    $statisticsData = getStat();
    echo "Total visitors:", sizeof($statisticsData  -> visits), "<br>";
//    for ($i = 0; $i < sizeof($stat -> visits); $i++) {
//        echo "address: ",
//        $stat -> visits[$i] -> hostAddress,
//        ", date: ",
//        $stat -> visits[$i] -> date->format('Y-m-d H:i:s'),
//        "<br>";
//    }
?>

<head>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function( $ ) {
            var $table = $('table.scroll'),
                $bodyCells = $table.find('tbody tr:first').children(),
                colWidth;

            // Adjust the width of thead cells when window resizes
            $(window).resize(function() {
                // Get the tbody columns width array
                colWidth = $bodyCells.map(function() {
                    return $(this).width();
                }).get();

                // Set the width of thead columns
                $table.find('thead tr').children().each(function(i, v) {
                    $(v).width(colWidth[i]);
                });
            }).resize();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="css/admin_styles.css" />
</head>

<body id="home">
    <div id="header" class="divRow">
        <table class="tg scroll">
            <thead>
                <tr>
                    <th class="tg-amwm">Address</th>
                    <th class="tg-amwm">Date, time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($statisticsData -> visits as $visit): ?>
                    <tr>
                        <td class="tg-yw4l"><?php echo $visit -> hostAddress; ?></td>  <td class="tg-yw4l"><?php echo $visit -> date->format('Y-m-d H:i:s') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</body>