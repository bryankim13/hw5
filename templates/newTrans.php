<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="your name">
        <meta name="description" content="include some description about your page">  

        <title>Trivia Game Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>

    <body>
        <div class="container" style="margin-top: 15px;">
            <div class="row col-xs-8">
                <h1>CS4640 Television Trivia Game - Get Started</h1>
                <p> Welcome to our trivia game!  To get started, login below or enter a new username and password to create an account</p>
            </div>
            <div class="row justify-content-center">
                test
            </div>
        </div>
        <div>
            <form action="<?=$this->url?>/newTrans/" method="post">
                <div class="container-fluid px-5">
                <div class="mx-6">
                    <label for="name" class="form-label">Transaction Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mx-6">
                    <label for="date" class="form-label"> Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mx-6">
                    <label for="amount" class="form-label">Transaction Name</label>
                    <input type="number" class="form-control" id="amount" name="amount" min="0.01" required>
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