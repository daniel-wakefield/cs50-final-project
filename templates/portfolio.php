
    
<div>
    <!--creates the button to click if you want to update the bets-->
    <button onclick="update()">Update Bets</button>

</div>
<br/>

<!-- creates the table where the bets are displayed - each button submits the bet number so that when that
is clicked we know which bet was taken-->
<form action="user.php" method="get">
    <table id ="betTable">
    <?php
        
        foreach($rows as $row)
        {
            
            print("<tr>");
                print("<td class='color1'> Bet#:{$row["bet"]} </td>");
                print("<th class='color1' >{$row["Title"]}</th>");
                print("<th class = 'color3'>Amount</th>");
                print("<td class = 'color3' rowspan='3'><button type='submit' name='bet' class='btn btn-default' value='{$row["bet"]}'>Take Bet</button></td>");
            print("</tr>");
            print("<tr>");
                print("<th class ='color2'> Description </th>");
                print("<td class = 'color2'>{$row["description"]}</td>");
                print("<td class='color3' rowspan='2'>\${$row["amount"]}</td>");
            print("</tr>");
            print("<tr>");
                print("<th class = 'color2'>End Date</td>");
                print("<td class='color2'>{$row["end"]}</td>");    
            print("</tr>");
            print("<tr class='blank_row'>");
                print("<td class='blank_cell' colspan = '4'></td>");
            print("</tr>");
            
        }
    ?>
    </table>
</form>




