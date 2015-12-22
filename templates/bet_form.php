<h2> Place Your Bets! </h2>
<div id="betDescription">
Bets must have:
<ul>
    <li> an end date - the date upon which they will be payed out </li>
    <li> a clear description of what is being bet upon </li>
    <li> an amount being bet - currently all bets have 1:1 odds </li>
</div>

<form action="bet.php" method="post">
    <fieldset>
        <div class="form-group">
        
            Title: <input type="text" name="title">
        </div>
        <div class="form-group">
            <textarea name="description" style="width: 400px; height: 150px;">Enter Description of Bet</textarea>   
        </div>
        
        
        <div id="date">
        <div class="form-group">
            End Date: <input type="date" name="end"/>
        </div>  
        
        <div class="form-group">
            Bet Amount (US$): <input type="number" name="amount" min="1"/>
        </div> 
        </div>
        <div class="form-group" id="betButton">
            <button type="submit" class="btn btn-default">Submit Bet</button>
        </div>
        
    </fieldset>
</form>

        
       
