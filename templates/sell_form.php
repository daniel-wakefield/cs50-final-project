<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option value=" "> -- </option>
                <?php foreach ($symbols as $symbol): ?>
                    
                    <option value= "<?=$symbol['symbol']?>"><?= $symbol["symbol"] ?></option>
                    
                <?php endforeach ?>
            </select>
        </div>
        <br/>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>
<br/>
<div>
    go to <a href="index.php">hompage</a>
</div>
