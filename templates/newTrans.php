<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="your name">
        <meta name="description" content="include some description about your page">  

        <title>New Transaction</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
              <p class="navbar-brand px-3 mx-auto"><?=$user2["name"]?></p>
              <p class="navbar-brand px-3 mx-auto"><?=$user2["email"]?></p>
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
        <div>
            <?php
                if (!empty($error_msg)) {
                    echo "<div class='alert alert-danger'>$error_msg</div>";
                }
            ?>
            <form action="<?=$this->url?>/newTrans/" method="post">
                <div class="container-fluid px-5">
                <div class="mx-6">
                    <label for="name" class="form-label">Transaction Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mx-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mx-6">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="mx-6">
                    <label for="type" class="form-label">Transaction Type</label>
                    <select id="type" name="type" class="form-select" required size="2">
                        <option value="credit" selected>Credit</option>
                        <option value="debit">Debit</option>
                    </select>
                </div>
                <button type="submit" style="color: white; margin: 5px 3px; background-color: blue">Submit</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>