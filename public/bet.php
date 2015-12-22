<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("bet_form.php", ["title" => "Place Bet"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // the user has to be logged in to submit a bet
        if (empty($_SESSION["id"]))
        {
            apologize("you must be logged in to submit a bet");
        }
        
        // get the amount of cash they currently have, they are not allowed to
        // submit a bet for more than the amount of cash they have
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        $cash = $cash[0]["cash"];
        
        if($cash < $_POST["amount"])
        {
            //apologize if not enoug cash
            apologize("not enough cash");
        }
        
        // insert their bet into the bet table
        if (query("INSERT INTO bets (maker, end, description, amount, Title) VALUES (?, ?, ?, ?, ?);", 
            $_SESSION["id"], $_POST["end"], $_POST["description"], $_POST["amount"], $_POST["title"]) === false)
        {
            apologize("error communicating with server");
        }
        
        // update the amount of cash the user has
        if (query("UPDATE users SET cash = cash - ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]) === false)
        {
            apologize("error communicating with server");
        }
        
        // update the amount of pending cash a user has
        if (query("UPDATE users SET pending = pending + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]) === false)
        {
            apologize("error communicating with server");
        }
        
        
        //redirect to the index
        redirect("/");
    }

?>
