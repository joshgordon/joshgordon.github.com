<?php

include "assets.php";  

top("Josh Gordon", "home") ; 
?>  

          <div class="page-header">
            <h1>
              Josh Gordon <small>Nerdy CS Major</small>
            </h1>
          </div>
<?php
echo shell_exec("markdown index.md"); 

bottom() ;

?> 
