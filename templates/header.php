<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>
            
            /*
             * this function updates the bet table found on the homepage
             */
            /*function update() {
                
                // get the update data from update.php
                $.getJSON("update.php", function(data){
                
                    // get the table element we want to update
                    var table = document.getElementById("betTable");
                    
                    // set index for for loop
                    var x;
                    
                    // loop through the data in the JSON array
                    for (x in data)
                    {
                        // update the table
                        $('#betTable > tbody >  tr:first').before('<tr class = \'blank_row\'><td class = \'blank_cell\' colspan = \'4\'></td></tr>');
                        table.insertRow(0).innerHTML = "<th class = 'color2'>End Date</td><td class='color2'>"+data[x].end+"</td>"; 
                        table.insertRow(0).innerHTML = "<th class ='color2'> Description </th><td class = 'color2'>"+data[x].description+"</td><td class='color3' rowspan='2'>\$"+data[x].amount+"</td>";
                        table.insertRow(0).innerHTML = "<td class='color1'> Bet#:"+data[x].bet+"</td><th class='color1'>"+data[x].Title+"</th><th class = 'color3'>Amount</th><td class = 'color3' rowspan='3'><button type='submit' name='bet' class='btn btn-default' value='"+data[x].bet+"'>Take Bet</button></td>";                     
                    }
                });
                
            }
            
            /*
             * This function updates the information you see in the header, the bets
             * submitted, taken, and cash fields
             */
            /*function updateHeader() 
            { 
                // get data from JSON array
                $.getJSON("stats.php", function(data){
                    
                    // get the elements to update
                    var placedSpan = document.getElementById('placed');
                    var takenSpan = document.getElementById('taken');
                    var notTakenSpan = document.getElementById('notTaken');
                    var youTookSpan = document.getElementById('youTook');
                    var cashSpan = document.getElementById('cash');
                    var unmatchedSpan = document.getElementById('unmatched');
                    var matchedSpan = document.getElementById('matched');
                    
                    // update the elements
                    placedSpan.innerHTML = data.placed;
                    takenSpan.innerHTML = data.taken;
                    notTakenSpan.innerHTML = data.notTaken;
                    youTookSpan.innerHTML = data.youTook;
                    cashSpan.innerHTML = data.cash;
                    unmatchedSpan.innerHTML = data.unmatched;
                    matchedSpan.innerHTML = data.matched;
                });
            }
            
            // update the header ever 5 seconds    
            window.setInterval(updateHeader(), 5000);
            
        </script>
        
    </head>

    <body>

        <div class="container">

            <div id="top">
                <!--the information about the users finances -->
                <a href="/">Bet The World</a>
                <h4 id="placedBets">Bets Submitted: <span id="placed">   </span>
                Taken: <span id="taken">   </span>
                Untaken: <span id="notTaken">  </span></h4>
                <h4 id="takenBets">Bets You've Taken: <span id="youTook"></span></h4> 
                <h4 id="bankroll"> Unwagered Cash: $<span id = "cash"></span>
                Unmatched Bets: $<span id = "unmatched"></span>
                Matched Bets: $<span id = "matched"></span> </h4>
            </div>
            
            <br/>
            <br/>
            <br/>

            <div id="middle">
            
                <!-- the navigation elements that will appear on every page -->
                <ul class="nav nav-pills">
                    <li>   
                        <a href="login.php">Log In</a>
                    </li>
                    <li>
                        <a href="my_bets.php">My Bets</a>
                    <li>
                        <a href="bet.php">Place Bet</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                    <li>
                        <a href="payout.php">Decide Payout</a>
                    </li>
                    <li>
                        <a href="deposit.php">Deposit Funds</a>
                    </li>
                    <li>
                        <a href="logout.php"><strong>Log Out</strong></a>  
                    </li>
                    
                </ul>
