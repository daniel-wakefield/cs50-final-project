<?php 

    require("../includes/config.php");
    
    if (empty($_SESSION["id"]))
    {
        $array = ["placed" => 0, "taken" => 0, "notTaken" => 0, "youTook" => 0];
    }
    
    else
    {
        $placed = query("SELECT COUNT(bet) FROM bets WHERE maker =?", $_SESSION["id"]);
        
        $placed = $placed[0]["COUNT(bet)"];
            
        $taken = query("SELECT COUNT(bet) FROM bets WHERE maker = ? AND taker IS NOT NULL", $_SESSION["id"]);
        
        $taken = $taken[0]["COUNT(bet)"];
        
        $notTaken = $placed - $taken;
        
        $youTook = query("SELECT COUNT(bet) FROM bets WHERE taker = ?", $_SESSION["id"]); 
        
        $youTook = $youTook[0]["COUNT(bet)"];
        
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        $cash = $cash[0]["cash"];
        
        $unmatched = query("SELECT SUM(amount) FROM bets WHERE maker = ? AND taker IS NULL", $_SESSION["id"]);
        
        $unmatched = $unmatched[0]["SUM(amount)"];
        
        if($unmatched == null)
        {
            $unmatched = 0;
        }
        
        $matched = query("SELECT SUM(amount) FROM bets WHERE (maker = ? AND taker IS NOT NULL) OR taker = ?", $_SESSION["id"], $_SESSION["id"]);
        
        $matched = $matched[0]["SUM(amount)"];
        
        if($matched == null)
        {
            $matched = 0;
        }
        
        $array = ["placed" => $placed, "taken" => $taken, "notTaken" => $notTaken, 
            "youTook" => $youTook, "cash" => $cash, "unmatched" => $unmatched, "matched" => $matched];
    }
    header("Content-type: application/json");
    print(json_encode($array, JSON_PRETTY_PRINT));
    
?>    
    
    
