<?php 
session_start();

if(isset($_SESSION["username"])) {
    require_once('../conf/config.php');
    include('header.php');
    ?>
    <!doctype html>
    <html class="no-js" lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP CMS</title>
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/foundation.css">
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/app.css">
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">

      </head>

      <body>

    <?php 

    //This gets today's date
    $date = time() ; 

    //This puts the day, month, and year in separate variables
    $day = date('d', $date) ;
    $month = date('m', $date) ;
    $year = date('Y', $date) ;

    //Here we generate the first day of the month
    $first_day = mktime(0,0,0,$month, 1, $year);

    //This gets us the month name
    $title = date('F', $first_day) ;

    //Here you find out what day of the week the first day of the month falls on 
    $day_of_week = date('D', $first_day) ; 

    //Once you know what day of the week it falls on, we know how many blank days occur before it. If the first day of the week is a Sunday, then it is zero

    switch($day_of_week) { 
        case "Sun": 
            $blank = 0; 
            break; 
        case "Mon": 
            $blank = 1; 
            break; 
        case "Tue": 
            $blank = 2; 
            break; 
        case "Wed": 
            $blank = 3; 
            break; 
        case "Thu": 
            $blank = 4; 
            break; 
        case "Fri": 
            $blank = 5; 
            break; 
        case "Sat": 
            $blank = 6; 
            break; 
     }

    //We then determine how many days are in the current month
    $days_in_month = cal_days_in_month(0, $month, $year);

    ?>

    <div class="card">

    <?php
    //Here you start building the table heads 
    echo "<table>";
    echo "<tr><th colspan=7> $title $year </th></tr>";
    echo "<tr><td width=42>S</td><td width=42>M</td><td 
    width=42>T</td><td width=42>W</td><td width=42>T</td><td 
    width=42>F</td><td width=42>S</td></tr>";

     //This counts the days in the week, up to 7
     $day_count = 1;

     echo "<tr>";

     //first you take care of those blank days
     while($blank > 0) { 
         echo "<td></td>"; 
         $blank = $blank-1; 
         $day_count++;
     }

    //sets the first day of the month to 1 
    $day_num = 1;

    //count up the days, until you've done all of them in the month
    while($day_num <= $days_in_month) { 
        echo "<td> $day_num </td>"; 
        $day_num++; 
        $day_count++;

        //Make sure you start a new row every week
        if ($day_count > 7) {
            echo "</tr><tr>";
            $day_count = 1;
        }
    }  
    //Finally you finish out the table with some blank details if needed
    while($day_count > 1 && $day_count <= 7) { 
        echo "<td></td>"; 
        $day_count++; 
    }

    echo "</tr></table>";
        ?>
    </div>
    <?php
    include('footer.php'); 
} ?>