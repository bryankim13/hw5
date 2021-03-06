<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="your name">
        <meta name="description" content="include some description about your page">  

        <title>Transaction History</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
              <p class="navbar-brand px-3 mx-auto"><?=$user["name"]?></p>
              <p class="navbar-brand px-3 mx-auto"><?=$user["email"]?></p>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-between"  id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                  <a class="nav-item nav-link active" href= "<?=$this->url?>/transaction_history/">Transaction History</a>
                  <a class="nav-item nav-link active" href= "<?=$this->url?>/newTrans/">New Transactions</a>
                  <a class="nav-item nav-link active" href= "<?=$this->url?>/logout/">Log Out</a>
                </div>
              </div>
            </nav> 
    </header>
    <body>


        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>Finance Tracking</h1>
                <p> Look at your finances!</p>
                <?php
                    echo "<p><b>Balance: $" . $data3[0]["bal"] . "</b></p>";
                ?>
            </div>
            <div class="row justify-content-center">
                transactionsHistory
                <?php
                    echo "<table><tr><td><center><b>Transaction Name</b></center></td><td><center><b>Date</b></center></td><td><center><b>Amount</b></center></td><td><center><b>Transaction Type</b></center></td></tr><br>";
                    foreach($data2 as $row) {
                        echo "<tr><td><center>" . $row["name"] . "</center></td><td><center>" . $row["date_transaction"] . "</center></td><td><center>" . $row["amount"] . "</center></td><td><center>" . $row["transaction_type"] . "</center></td></tr><br>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>