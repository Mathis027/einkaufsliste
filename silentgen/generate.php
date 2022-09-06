<script src="https://linkvertise.net/cdn/linkvertise.js"></script><script>linkvertise(110463, {whitelist: [""], blacklist: []});</script>

<?php
if(isset($_GET["gen"])) {
    $text = file_get_contents("ac-poqwpodqwjgrkonweiuonfvd.txt");
    $array = explode("\n",  $text);
    $link =  $array[array_rand($array)];
    echo '<a class="generate-link" target="_blank" href="https://kraekel.com/silentgen/generated.php?accounts=', urlencode($link), '">click here</a>';
}

?>