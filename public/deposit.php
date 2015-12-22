<?php
    
    // configure
    require("../includes/config.php");
    
    // if we link to page from index render the page
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("deposit_form.php", ["title" => "Deposit"]);
    }
    
    // else if we are trying to deposit money
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
        // if the deposit amount is empty apologize
        if (empty($_POST["amount"]))
        {
            apologize("must enter deposit amount");
        }
        
        // if the deposit amount is not a positive int
        if (!preg_match("/^\d+$/", $_POST["amount"]))
        {
            apologize("Deposit amount must be a positive int");
        }
        
        // update the amount of money in a users account
        if (query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]) === false)
        {
            apologize("error communicating with databse");
        }
        
        // redirect to homepage
        redirect("/");
    }
