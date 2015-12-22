<?php
/*
 * this is the form that get submitted whenever the user hits the take bet
 * button that is in the table on the index
 */
 
    require("../includes/config.php");
    
    // check to see if the bet has already been taken or not
    $taken = query("SELECT taker FROM bets WHERE bet = ?", $_GET["bet"]);
    
    // if the taker column is filled then the bet has already been taken
    if($taken[0]["taker"] !== null)
    {
        apologize("Bet has already been taken");
    }
    
    // get the user's current balance
    $balance = query("SELECT cash FROM users WHERE id =?", $_SESSION["id"]);
    
    $balance = $balance[0]["cash"];
    
    // get the amount of the bet
    $amount = query("SELECT amount FROM bets WHERE bet = ?", $_GET["bet"]);
    
    $amount = $amount[0]["amount"];
    
    // if their balance is less than the amount of the bet
    if($balance < $amount)
    {
        // apologize that they cannot take the bet
        apologize("Not enough cash");
    }
    
    // update bets table setting taker to the current users id
    query("UPDATE bets SET taker = ? WHERE bet = ?", $_SESSION["id"], $_GET["bet"]);
    
    // update their amount of cash
    query("UPDATE users SET cash = cash - $amount WHERE id = ?",$_SESSION["id"]);
    
    // update their amount of pending cash
    query("UPDATE users SET pending = pending + $amount WHERE id = ?", $_SESSION["id"]);
        
    // redirect to index
    redirect("/");  
    
?>
