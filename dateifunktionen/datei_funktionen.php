<?php 
// Aufgabe 1:
// Schreiben Sie in die Datei "testdatei.txt" 100 mal die Zeichenkette "TEST" hinein.
$handle = fopen("testdatei.txt",'w');
for($i=0; $i<100; $i++) {
	fwrite($handle,'TEST ');
}
fclose($handle);

// Alternative:
$handle = fopen("testdatei2.txt",'w');
fwrite($handle, str_repeat('TEST ',100));
fclose($handle);

// Aufgabe 2:
// Jedes Mal wenn das PHP-Skript aufgerufen wird, soll ein Eintrag in die Datei 
// "log.txt" erfolgen. In diese Datei soll das aktuelle Datum und die aktuelle Zeit 
// eingetragen werden. Die Einträge sollen untereinander erfolgen und immer 
// angehängt werden (Dateifunktionen nutzen!)
$handle = fopen("log.txt",'a');
$save   = date("d.m.Y - H:i:s");
fwrite($handle,$save."\n");
fclose($handle);

// Aufgabe 3:
// Schreiben Sie ein PHP-Skript, welches jeden Skriptaufruf zählt. 
// Der Zählerstand soll in einer Datei mit dem Namen "counter.txt"
// gespeichert werden. Der aktuelle Zählerstand soll auf der Webseite
// angezeigt werden.
// Die Datei counter.txt soll manuell angelegt werden und zum Start den 
// Inhalt 0 erhalten.

// Automatisches anlegen:
if(!file_exists("counter.txt")) {
	$handle = fopen("counter.txt","w");
	fwrite($handle,"0");
	fclose($handle);
}

// Pseudocode:
// Datei öffnen - Mit Modus "r+"
$handle = fopen("counter.txt","r+");
// Dateiinhalt auslesen und in die Variable $counter ablegen 
$counter = fread($handle,20);
// Dateizeiger wieder auf den Anfang setzen 
rewind($handle);
// Variableninhalt $counter um 1 erhöhen 
$counter++;
// Neuen Inhalt von Variable $counter in Datei schreiben 
fwrite($handle,$counter);
// Datei schließen
fclose($handle);
// Ausgabe von Variable $counter
echo $counter;




?>