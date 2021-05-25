<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>Order food & drinks</title>
</head>

<body>
    <?php

    ?>
    <div class="container">
        <h1>Order food in restaurant "the Personal Ham Processors"</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="?food=1">Order food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?food=0">Order drinks</a>
                </li>
            </ul>
        </nav>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input value="
                    <?php if (isset($_SESSION["email"])) { ?>
                         <?php echo $_SESSION["email"] ?> 
                    <?php } ?>" type="text" id="email" name="email" class="form-control" />
                    <?php if (isset($email_error)) { ?>
                        <?php echo $email_error ?>
                    <?php } ?>
                    <?php if (isset($email_filterError)) { ?>
                        <?php echo $email_filterError ?>
                    <?php } ?>


                </div>
                <div></div>
            </div>

            <fieldset>
                <legend>Address</legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" class="form-control" value=<?php if (isset($street_error)) { ?> <?php echo $street_error ?> <?php } ?>>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetnumber">Street number:</label>
                        <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="
                        <?php if (isset($streetNumber_error)) { ?>
                             <?php echo $streetNumber_error ?> 
                        <?php } ?>
                        <?php if (isset($streetnumeric_error)) { ?>
                        <?php echo $streetnumeric_error ?>
                        <?php } ?>
                        <?php if (isset($streetNumber)) { ?>
                        <?php echo $_SESSION["streetnumber"] ?>
                        <?php } ?>">



                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" class="form-control">
                        <?php if (isset($city_error)) { ?>
                            <p> <?php echo $city_error ?> </p>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" id="zipcode" name="zipcode" class="form-control" value="
                       
                        <?php if (isset($_SESSION["zipcode"])) { ?>
                        <?php echo $_SESSION["zipcode"] ?>
                    
                        <?php } ?>">
                        <?php if (isset($zipcode_error)) { ?>
                            <?php echo $zipcode_error ?>
                        <?php } ?>
                        <?php if (isset($zipcodenum_error)) { ?>
                            <?php echo $zipcodenum_error ?>
                        <?php } ?>


                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Products</legend>
                <?php foreach ($products as $i => $product) : ?>
                    <label>
                        <input type="checkbox" value="1" name="products[<?php echo $i ?>]" /> <?php echo $product['name'] ?> -
                        &euro; <?php echo number_format($product['price'], 2) ?></label><br />
                <?php endforeach; ?>
            </fieldset>

            <label>
                <input type="checkbox" name="express_delivery" value="5" />
                Express delivery (+ 5 EUR)
            </label>

            <button type="submit" class="btn btn-primary">Order!</button>
        </form>

        <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
    </div>

    <style>
        footer {
            text-align: center;
        }
    </style>
    <?php whatIsHappening() ?>
</body>

</html>