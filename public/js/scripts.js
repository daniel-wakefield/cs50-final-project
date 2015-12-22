/**
 * scripts.js
 *
 * Computer Science 50
 * Final Project
 *
 * Global JavaScript, if any.
 */
 
 /*
             * this function updates the bet table found on the homepage
             */
            function update() {
                
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
            function updateHeader() 
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
