<?php
#------------------------------------------------------------------------------------------#
#  Copyright (c) Dr. R. Urban                                                              #
#  24.05.2015                                                                              #
#  Web-GUI-for-stockfish-chess                                                             #
#  https://github.com/antiproton                                                           #
#  Released under the MIT license                                                          #
#  https://github.com/antiproton/Web-GUI-for-stockfish-chess/blob/master/LICENSE           #
#------------------------------------------------------------------------------------------#

include "config.php";

$fen = $_POST['fen'];
if ( isset( $_GET['fen'] ) ) $fen = $_GET['fen'];
if ($fen == ""){echo "Web GUI for Stockfish Chess by Dr. R. Urban - Stockfish 061214 by Tord Romstad, Marco Costalba and Joona Kiiski ";exit;}




$time = microtime(1);
$cwd='./';


$sf  = $pfad_stockfish;


$descriptorspec = array(
0 => array("pipe","r"),
1 => array("pipe","w"),
) ;

$other_options = array('bypass_shell' => 'true');

$process = proc_open($sf, $descriptorspec, $pipes, $cwd, null, $other_options) ;

if (is_resource($process)) {
fwrite($pipes[0], "uci\n");
fwrite($pipes[0], "ucinewgame\n");
fwrite($pipes[0], "isready\n");

fwrite($pipes[0], "position fen $fen\n");  // rnbqkbnr/pppp1ppp/8/4p3/4P2P/8/PPPP1PP1/RNBQKBNR b KQkq h3 0 2
fwrite($pipes[0], "go movetime $thinking_time\n");

$str="";

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str .= $s;
if(strpos(' '.$s,'bestmove')){
break;
}
}

#echo $s;
$teile = explode(" ", $s);

$zug = $teile[1];



#echo $zug;

$str = $zug;


  for ($i=0; $i < 4; $i++)
  {
    $str[$i];
  }


fclose($pipes[0]);
fclose($pipes[1]);
proc_close($process);

}

header('Content-Type: text/html; charset=utf-8'); // sorgt f�r die korrekte Kodierung
header('Cache-Control: must-revalidate, pre-check=0, no-store, no-cache, max-age=0, post-check=0'); // ist mal wieder wichtig wegen IE
echo $str[0].$str[1]."-".$str[2].$str[3];
exit;
#echo "<br>";
#echo microtime(1)-$time;


?>