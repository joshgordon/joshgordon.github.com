<?php

include "assets.php";  

top("Josh Gordon", "home") ; 
?>  
<div style="text-align: center;">
  <img src="joshgordon.gif"  width="100%"/>
</div> 

<div class="page-header">
  <h1>
    Josh Gordon <small>Nerdy CS Major gone Programmer</small>
  </h1>
</div>
<!--<div class="infoBar">
  <div class="infoLogo">
    <img src="Vimlogo.svg">
  </div>
  <div class="infoText">
    This user edits in vim
  </div>
</div>
-->
<?php
echo shell_exec("markdown index.md"); 

bottom() ;

?> 
