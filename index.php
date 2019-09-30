<?php
include "config.php";

?>

<!doctype html>
<html>
<head>

  <link rel="stylesheet" href="css/chessboard.css" />

<script src="js/chess.js"></script>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/chessboard.js"></script>
<script src="js/ajax.js"></script>
<script src="js/board.js"></script>


</head>
<body>


<!--  Copyright (c) Dr. R. Urban    -->
<table width="100%"  border="0">
  <tr>
    <td width="38%" rowspan="8" valign="top"><div id="board" style="width: 450px"></div>
	  <p><span id="captured_pieces_w"></span><br><br>
      </p>
	        <span id="captured_pieces_b"></span>
	    
      <hr align="left" width="450" size="1" /> </td>
    <td width="62%">
 
  </td>
  </tr>

  <tr>
    <td><p>Sound:
        <input type="checkbox" id="soundcheck" onClick="soundcheck()" value="checkbox" checked>      
      Stockfish vs. Stockfish:<span id="result_box" class="short_text" lang="en"> </span>
      <input type="checkbox" id="stockfcheck" onClick="stockfcheck()" value="checkbox">
      </p>
      <p><strong>Thinktime: <?php echo $thinking_time ?> milliseconds</strong></p>
      <p><strong> Movetime: 2 seconds</strong></p>
      <p><br />
        <input type="button" id="whiteOrientationBtn" value="White orientation" />
        <input type="button" id="blackOrientationBtn" value="Black orientation" />
        <input type="button" id="flipOrientationBtn" value="Flip orientation" />
      </p></td>
  </tr>
  <tr>
    <td height="0" valign="top"><p>
        <input type="button" id="move" value="MOVE" /> 
        </p>
      <form name="form1" method="post" action="">
      <input type="submit" name="Submit" value="INIT">
    </form></td>
  </tr>
  <tr>
    <td>Engine moved: 
    <span  id="content"></span></td>
  </tr>
  <tr>
    <td height="0">Status: <span id="status"></span></td>
  </tr>
  <tr>
    <td height="0">FEN: <span id="fen"></span></td>
  </tr>
  <tr>
    <td>PGN: <span id="pgn"></span></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>