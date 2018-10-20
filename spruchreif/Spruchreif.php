<?php

$arrZitat = array();

$arrZitat[0] = "Darum sind solche Spiele ganz gut, auch mal, dass du mit beiden Boden auf den Tatsachen bist. (Frank Rost)";
$arrZitat[1] = "Je länger du auswärts verlierst, desto größer ist die Wahrscheinlichkeit, dass du auch mal gewinnst. (Jörg Stiel)";
$arrZitat[2] = "Juskowiak hat mich so angebrüllt, da habe ich mich ziemlich erschrocken, von daher war es Torwartbehinderung. (Martin Pieckenhagen)";
$arrZitat[3] = "Wenn das Hirn genauso entwickelt wäre wie sein rechter Fuß, dann muss ich ganz ehrlich sagen, dann wäre es großartig. (Dieter Hoeneß über Mario Basler)";
$arrZitat[4] = "Ich habe ja mein erstes Länderspiel in Südafrika gemacht und es ist ja eigentlich eine beeindruckende Begegnung, Nelson Mandela die Hand zu schütteln, nur als er dann sagte, ich sehe aus wie Steffi Graf, da war ich doch etwas schockiert. (Marco Bode)";
$arrZitat[5] = "Zuerst hatten wir kein Glück und dann kam auch noch Pech dazu. (Jürgen Wegmann)";
$arrZitat[6] = "Die Sanitäter haben mir sofort eine Invasion gelegt. (Fritz Walter)";
$arrZitat[7] = "Mailand oder Madrid - Hauptsache Italien. (Andreas Möller)";
$arrZitat[8] = "Ob Felix Magath die Titanic gerettet hätte, weiß ich nicht. Aber die Überlebenden wären topfit gewesen. (Jan-Aage Fjörtoft)";
$arrZitat[9] = "Wir dürfen jetzt nur nicht den Sand in den Kopf stecken (Lothar Matthäus)";
$arrZitat[10] = "Ein Drittel mehr Geld? Nee, ich will mindestens ein Viertel. (Horst Szymaniak)";
$arrZitat[11] = "Wenn ich übers Wasser laufe, dann sagen meine Kritiker: Und Schwimmen kann er auch nicht. (Berti Vogts)";

shuffle($arrZitat);

$vblMax = count($arrZitat);
$vblMax--;

$vblZufall = mt_rand(0,$vblMax);

echo "<h1>$arrZitat[$vblZufall]</h1><br>";

?>