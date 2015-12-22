 <div id = "makerDiv">
 
    <!-- this is the table that shows the bets for which they are the maker-->
    <?php
        
        if (!empty($maker))
        {
            print("<table id = 'makerTable'>");
            print("<caption> Bets Made By You </caption>");
            foreach($maker as $row)
            { 
                print("<tr>");
                    print("<td class='color1'> Bet#: {$row["bet"]} </td>");
                    print("<th class='color1' >{$row["Title"]}</th>");
                    print("<th class = 'color4'>Status</th>");
                    print("<th class = 'color3'>Amount</th>");
                    
                print("</tr>");
                print("<tr>");
                    print("<th class ='color2'> Description </th>");
                    print("<td class = 'color2'>{$row["description"]}</td>");
                    if($row["taker"] !== null)
                    {
                        print("<td class='color4' rowspan='2' >Taken</td>");
                    }
                    else
                    {
                        print("<td class='color4' rowspan='2' >Untaken</td>");
                    }
                    print("<td class='color3' rowspan='2'>\${$row["amount"]}</td>");
                print("</tr>");
                print("<tr>");
                    print("<th class = 'color2'>End Date</td>");
                    print("<td class='color2'>{$row["end"]}</td>");    
                print("</tr>"); 
                print("<tr>");
                
                print("</tr>");
                print("<tr class='blank_row'>");
                    print("<td class='blank_cell' colspan = '4'></td>");
                print("</tr>");
                
            }
            print("</table>");
        }
        else
        {
            //if they haven't made any bets display this
            print("you have not made any bets");
        }
    ?>
</table>
</div>

<div id="takerDiv">
 <table id ="takerTable">
 <!-- this is the table that shows the bets for which they are the taker-->
    <?php
        if (!empty($taker))
        {
            print("<caption>Bets Taken By You </caption>");
            foreach($taker as $row)
            {
                
                print("<tr>");
                    print("<td class='color1'> Bet#: {$row["bet"]} </td>");
                    print("<th class='color1' >{$row["Title"]}</th>");
                    print("<th class = 'color3'>Amount</th>");
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
        }
        else
        {
            //if they haven't taken any bets
            print("you have not taken any bets");
        }
    ?>
</table>
</div>
