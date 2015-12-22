<?php

    // configuration
    require("../includes/config.php");
    
    // if we link to page from index
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // get stock symbols for stock we can sell
        $symbols = query("SELECT symbol FROM portfolios where id = ?", $_SESSION["id"]);
       
        // if something went wrong with query
        if ($symbols === false)
        {
            apologize("Error communicating with databse");
        } 
        
        // else render the page
        else
        {
            render("sell_form.php", ["title" => "Sell Form", "symbols" => $symbols]);
        }
    }
    
    // if use is trying to sell a stock
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if no stock was selected to back to index
        if (($_POST["symbol"])===" ")
        {
            redirect("/");
        }
        
        // put symbol into a variable
        $symbol = $_POST["symbol"];
        
        // look up the number of shares of that stock a user has
        $shares = query("SELECT shares FROM portfolios WHERE id = ? AND symbol = '$symbol'", $_SESSION["id"]);
        
        // get current information on stock
        $stock = lookup($symbol);
        
        // the amount of money selling all shares of that stock would be worth
        $sale_value = $stock["price"] * $shares[0]["shares"];
        
        // delete that stock form their portfolio
        if (query("DELETE FROM portfolios WHERE id = ? AND symbol = '$symbol'", $_SESSION["id"]) === false)
        {
            apologize("error communicating with databse");
        }
        
        // update the amount of cash a user now has
        if (query("UPDATE users SET cash = cash + $sale_value WHERE id = ?", $_SESSION["id"]) === false)
        {
            apologize("error communicating with databse");
        }
        
        // put sale into history
        if (query("INSERT INTO history (id, symbol, shares, price, boughtSold)
            VALUES(?, '$symbol', ?, ?, 'SELL')", $_SESSION["id"], $shares[0]["shares"], 
            $stock["price"]) === false)
            {
                apologize("error communicating with databse");
            }
        
        // redirect to index
        redirect("/"); 
        
    }


?>
