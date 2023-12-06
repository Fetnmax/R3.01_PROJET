
<?php
$catalogue = new DOMDocument();
$testXML = file_get_contents("CD.xml");
$catalogue->loadXML($testXML);

$cdList = $catalogue->getElementsByTagName("cd");

foreach ($cdList as $cd) {
    $titre = $cd->getElementsByTagName("titre")->item(0)->nodeValue;
    $artiste = $cd->getElementsByTagName("artiste")->item(0)->nodeValue;
    $pochette = $cd->getElementsByTagName("pochette")->item(0)->nodeValue;

    echo "<div>";
    echo "<img src='$pochette' alt='$titre'>";
    echo "<p>Titre: $titre</p>";
    echo "<p>Artiste: $artiste</p>";
    echo '<form action="detail.php?cd='.urlencode($titre).'" method="get">';
    echo '<button type="submit">Choisir</button>';
    echo '</form>';
    echo "</div>";

}
?>
