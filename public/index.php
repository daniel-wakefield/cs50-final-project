<?php

    // configuration
    require("../includes/config.php");
    
    // get all of the available bets 
    $rows = query("SELECT * FROM bets WHERE resolved = 0 ORDER BY bet DESC");
    
    //record the latest bet id we are sending
    $_SESSION["max"] = query("SELECT MAX(bet) FROM bets");
    
    //render the page
    render("portfolio.php", ["title" => "Portfolio", "rows" => $rows]);

?>
