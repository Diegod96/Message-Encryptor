

<?php

    session_start();

    $proc = $_SESSION['algo'];
    $msg = $_SESSION['msg'];

    if ($proc == 'VIG') {
        $key = $_POST['key'];
    }

    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous">';
    include("nav.php");

    switch ($proc) {

        case 'VIG':
            $ciphertext = Encipher($msg, $key);
            echo "<div class='jumbotron'>";
            echo "<center>";
            echo "<div class = 'container'>";
            echo "<h1 style='color:green'>Congratulations! Your message has been processed</h1></center></div></div>";
            echo "<center>";
            echo "<table class='table table-hover table bordered bg-secondary' style='width: 50%'>";
            echo "<tr><td>";
            echo "<div class='container'><h4 style='color:white'>Your encrypted message is: <b style='color: gold'>" . "&emsp;&emsp;" . "$ciphertext</b></h4></div>";
            $decryptedtext = Decipher($ciphertext, $key);
            echo "<div class='container'><h4 style='color:white'>Your decrypted message is: <b style='color: white'>" . "&emsp;&emsp;" . "$decryptedtext</b></h4></div>";
            echo "</td></tr></table></center>";

            echo "<div class=\"row\">
  <div class=\"col-sm-12\">
    <div class=\"text-center\">
    <a href='index.php'>
      <button class=\"btn btn-primary\" id=\"singlebutton\">Encrypt Another Message</button>
      </a>
    </div>
  </div>
</div>";

            break;

        case 'ROT':
            $ciphertext = ROT13_Encrypt($msg);
            echo "<div class='jumbotron'>";
            echo "<center>";
            echo "<div class = 'container'>";
            echo "<h1 style='color:green'>Congratulations! Your message has been processed</h1></center></div></div>";
            echo "<center>";
            echo "<table class='table table-hover table bordered bg-secondary' style='width: 50%'>";
            echo "<tr><td>";
            echo "<div class='container'><h4 style='color:white'>Your encrypted message is: <b style='color: gold'>" . "&emsp;&emsp;" . "$ciphertext</b></h4></div>";

            $decryptedtext = ROT13_Encrypt($ciphertext);
            echo "<div class='container'><h4 style='color:white'>Your decrypted message is: <b style='color: white'>" . "&emsp;&emsp;" . "$decryptedtext</b></h4></div>";
            echo "</td></tr></table></center>";

            echo "<div class=\"row\">
  <div class=\"col-sm-12\">
    <div class=\"text-center\">
    <a href='index.php'>
      <button class=\"btn btn-primary\" id=\"singlebutton\">Encrypt Another Message</button>
      </a>
    </div>
  </div>
</div>";
    }

    function ROT13_Encrypt($msg) {
        $A = str_split(strtolower($msg));
        $SZ = sizeof($A);

        for ($i = 0; $i < $SZ; $i++) {
            $B[$i] = ord($A[$i]) - 97;
            $C[$i] = ($B[$i] + 13) % 26;
            $D[$i] = chr($C[$i] + 97);
        }

        return implode($D);
    }

    function Mod($a, $b)
    {
        return ($a % $b + $b) % $b;
    }

    function Cipher($input, $key, $encipher)
    {
        $keyLen = strlen($key);

        for ($i = 0; $i < $keyLen; ++$i)
            if (!ctype_alpha($key[$i]))
                return ""; // Error

        $output = "";
        $nonAlphaCharCount = 0;
        $inputLen = strlen($input);

        for ($i = 0; $i < $inputLen; ++$i) {
            if (ctype_alpha($input[$i])) {
                $cIsUpper = ctype_upper($input[$i]);
                $offset = ord($cIsUpper ? 'A' : 'a');
                $keyIndex = ($i - $nonAlphaCharCount) % $keyLen;
                $k = ord($cIsUpper ? strtoupper($key[$keyIndex]) : strtolower($key[$keyIndex])) - $offset;
                $k = $encipher ? $k : -$k;
                $ch = chr((Mod(((ord($input[$i]) + $k) - $offset), 26)) + $offset);
                $output .= $ch;
            } else {
                $output .= $input[$i];
                ++$nonAlphaCharCount;
            }
        }

        return $output;
    }

    function Encipher($input, $key)
    {
        return Cipher($input, $key, true);
    }

    function Decipher($input, $key)
    {
        return Cipher($input, $key, false);
    }

?>
