<?php
/*
 * this is the page that updates the tables when a winner of a bet is decided
 */

    require("../includes/config.php");
    
    // if the bet taker won
    if (!empty($_POST["taker"]))
    {
        // find the amount of the bet
        $amount = query("SELECT amount FROM bets WHERE bet = ?", $_POST["taker"]);
        $amount = $amount[0]["amount"];
        
        // find who made the bet
        $maker = query("SELECT maker FROM bets WHERE bet = ?", $_POST["taker"]);
        $maker = $maker[0]["maker"];
        
        // find who took the bet
        $taker = query("SELECT taker FROM bets WHERE bet = ?", $_POST["taker"]);
        $taker = $taker[0]["taker"];
        
        // update the bet table to say that this bet has been resolved
        if (query("UPDATE bets SET resolved = 1 WHERE bet = ?", $_POST["taker"]) === false)
        {
            apologize("error communicating with server");
        }
        
        // update the finances of the taker
        if (query("UPDATE users SET pending = pending - $amount, cash = cash +$amount WHERE id = $taker") === false)
        {
            apologize("error communicating with server");
        }
        // update the finances of the maker
        if (query("UPDATE users SET pending = pending -$amount WHERE id = $maker") === false)
        {
            apologize("error communicating with server");
        }
    }
    if(!empty($_POST["maker"]))
    {
        // find the amount of the bet
        $amount = query("SELECT amount FROM bets WHERE bet = ?", $_POST["maker"]);
        $amount = $amount[0]["amount"];
        
        // who made the bet?
        $maker = query("SELECT maker FROM bets WHERE bet = ?", $_POST["maker"]);
        $maker = $maker[0]["maker"];
        
        // who took the bet?
        $taker = query("SELECT taker FROM bets WHERE bet = ?", $_POST["maker"]);
        $taker = $taker[0]["taker"];
        
        // record that the bet has been resolved
        if (query("UPDATE bets SET resolved = 1 WHERE bet = ?", $_POST["maker"]) === false)
        {
            apologize("error communicating with server");
        }
        
        // update the maker's finances
        if (query("UPDATE users SET pending = pending - $amount, cash = cash +$amount WHERE id = $maker") === false)
        {
            apologize("error communicating with server");
        }
        
        // update the taker's finances if there was a taker
        if($taker !== null)
        {
            if (query("UPDATE users SET pending = pending - $amount WHERE id = $taker") === false)
            {
                apologize("error communicating with server");
            }
        }
    }
    
    // redirect to index
    redirect("/");
    
?>
