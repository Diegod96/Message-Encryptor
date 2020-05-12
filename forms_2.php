

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include("nav.php")
        ?>
        <div class="container">
            <form name="form2" method="post" action="encrypt_data.php">
                <table class="table table-striped table-hover table-bordered">
                    <div class="form-group">
                        <tr>
                            <td colspan="2">
                                <h2 style="color:maroon"><center>Key for Vigenere Encryption</center></h2>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <td>
                                <label>
                                    <h4>Encryption Key:</h4>
                                </label>
                            </td>
                            <td>
                                <input type="text" name="key" class="form-control" required placeholder="Type your encryption key">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </td>
                        </tr>
                    </div>
                </table>
            </form>
        </div>
    </body>
</html>
