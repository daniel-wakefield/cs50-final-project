<form action="payUsers.php" method="post">
    <table id ="payoutTable">
    <?php
        
        foreach($rows as $row)
        {
        
            
            print("<tr>");
                print("<td class='color1'> Bet#: {$row["bet"]} </td>");
                print("<th class='color1' >{$row["Title"]}</th>");
                print("<th class = 'color3'>Amount</th>");
                print("<td class = 'color3' rowspan='3'><button type='submit' name='maker' class='btn btn-default' value='{$row["bet"]}'>Maker Won</button></td>");
                if($row["taker"] !== null)
                {
                    print("<td class = 'color3' rowspan='3'><button type='submit' name='taker' class='btn btn-default' value='{$row["bet"]}'>Taker Won</button></td>");
                }
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
