<?php
/* 
 * this is the page the show each user the bets they are involved in
 * either as the taker or the maker
 */
    require("../includes/config.php");
    
    // if they are not logged in
    if (empty($_SESSION["id"]))
    {
        // you cannot see this page
        apologize("You must be logged in to view your bets.");
    }
    
    // find the bets for which they are the maker
    $maker = query("SELECT * FROM bets WHERE maker = ? ORDER BY bet DESC", $_SESSION["id"]);
    
    // find the bets for which they are the taker
    $taker = query("SELECT * FROM bets WHERE taker = ? ORDER BY bet DESC", $_SESSION["id"]);
    
    // render the page
    render( "my_bet_form.php", ["title" => "My Bets", "maker" =>$maker, "taker" => $taker]);
?>
