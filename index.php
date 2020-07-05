<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            text-align: center;
            font-size: 24pt;
        }
    </style>
</head>
<body>
    <form method="POST" action="index.php">
        <input name="value" type="number" placeholder="Value" value=0>
        <br>
        <select name="currencyfirst">
            <option value="dollar">Dollar</option>
            <option value="real">Real</option>
        </select>
        <span> To </span>
        <select name="currencysecond">
            <option value="real">Real</option>
            <option value="dollar">Dollar</option>
        </select>
    <?php 
        require_once "Currency.php";
        $c1 = $_POST["currencyfirst"] ?? null;
        $c2 = $_POST["currencysecond"] ?? null;
        $value = $_POST["value"] ?? 0;

        
        $currency = new Currency("Currency", 1);
        $dollar = new Currency("Dollar", 1);
        $real = new Currency("Real", $dollar->getValue() * 5.31);

        echo "<br> <input type='submit' value='Convert'> <br>";

        if($c1 == "dollar" && $c2 == "real"){
            $currency->setValue($value * $real->getValue());
            $currencyNew = round($currency->getValue(), 2);
            echo "<br> <input type='text' value='R$ {$currencyNew}' readonly>";
        }
        elseif($c1 == "real" && $c2 == "dollar"){
            $currency->setValue($value/$real->getValue());
            $currencyNew = round($currency->getValue(), 2);
            echo "<br> <input type='text' value='$ {$currencyNew}' readonly>";
        }
        else{
            $currency->setValue($value);
            $currencyNew = round($currency->getValue(), 2);
            echo "<br> <input type='text' value='{$currencyNew}' readonly>";
        }
            
    ?>        
    </form>
</body>
</html>