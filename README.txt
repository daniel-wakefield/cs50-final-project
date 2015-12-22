My project uses the MVC paradigm for it's organization.  I very much canabalized the 
implementation of PSET 7 in order to create my webpage so I went through the exact
same steps as far as setting permissions are concerned. 

Obviously you will need to put the entire project into a vhosts folder, however, 
navigating around the website should be pretty easy because all of the links are 
shown.  

At the top, in the header you will see a number of different values.  The first says
Bets Submitted: X Taken: Y Untaken: Z.  The bets submitted is the total number of bets 
you have submitted, the taken next to that is the number of bets other people have taken that you
have made, and untaken is the number that remain untaken. 

Under that you see "bets You've Taken" This is the number of other people's bets you have taken. 

Under this you will see a number called Unwagered Cash.  THis is the amount of money you have 
that you have not used to place a wager.  Unmatched bets is the amount of money you have put into
bets that nobody has taken.

And matched bets is the amount money in bets that other people are actively betting against you for. 

The first page you come to will be the homepage here you will see a table of all the 
bets made so far.  If someone has taken one of the bets it will not be displayed. You can 
see all of the bets made in the final/phpmyadmin page under bets.  

If you then click Update Bets on the homepage a javascript program will run and any new
bets placed by users since you loaded the page will be displayed. 

To take a bet all you need to do is click the "take bet" button next to any of the bet entries. 
When you do this your amount of unwagered cash will change, and the Matched Bets figure will also change
accordingly. 

if you then click 'Place Bet' at the top you will be taken to a page where you can place
a bet.  You however, cannot place a bet if you are not logged in, or if you input a bet
amount higher than the amount of money you have. 

Once you place your bet your amount of unwagered cash will be updated as well as your unmatched bets.
If someone decides to take one of the bets you blaced your unmatched bets figure will be decreased and 
your matched bets figure will be increased by the amount of the bet.

If you click on My Bets you will see two tables.  One of them will be the bets you have placed, and the other 
will be the bets made by other people that you have taken.  These two tables are almost identical except that 
the bets you have placed will have a field indicating whether or not they have been taken. 

If you then click on "decide payout" you will a list of bets that have been "unresolved" namely that they 
have not been decided yet.  Each bet has a date upon which it will end.  Once that date is passed this is 
the page where the winner is decided.  All you need to do is click on either maker or taker depending on who
has won the bet.  

The winner will have his matched bets number decreased by the wager amount, and his unwagered cash amount increase
by the wager amount.  The loser will only have his matched bets amount decreased by the wagered amount. 
