<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if there was no username
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        
        // if they didn't enter a password
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        
        // if confimation is not the same as password
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Password must match confirmation.");
        }
        else
        {
            // try to add new user to database
            if (query("INSERT INTO users (username, hash, cash, admin) VALUES(?, ?, 10000.00, ?)", $_POST["username"],
            crypt($_POST["password"]), $_POST["admin"]) === false)
            {   
                apologize("Username already is use");
            }
            
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() as id");
                
                // upon succesfull addition log them in and redirect to index
                $_SESSION["id"] = $rows[0]["id"];
                redirect("/");
            }
            
        }
        
    }
    
?>
