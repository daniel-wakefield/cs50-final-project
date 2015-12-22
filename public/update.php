<?php
    require("../includes/config.php");
    
    // this gets the new rows to be added to the table
    $rows = query("SELECT * FROM bets WHERE bet > ?", $_SESSION["max"]);
    
    // store the new max bet index
    $_SESSION["max"] = query("SELECT MAX(bet) FROM bets");
        
    //JSON print the data
    header("Content-type: application/json");
    print(json_encode($rows, JSON_PRETTY_PRINT));
     
?>
 


