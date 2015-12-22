<?php
/*
 * this page renders the payout form, the form where the winners and the losers
 * of the bets are decided
 */
    
    require("../includes/config.php");
    
    $admin = query("SELECT admin FROM users WHERE id = ?", $_SESSION["id"]);
    
    if ($admin[0]["admin"] == 0)
    {
        apologize("you must be an admin to see this page");
    }
    
    // get the bets that haven't been resolved and order them by earliest ending date
    $rows = query("SELECT * FROM bets WHERE resolved = 0 ORDER BY end ASC");
    
    // render the page
    render("payout_form.php", ["title" => "Payout", "rows" => $rows]);
    
?>
