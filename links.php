<?php

include "assets.php";  


top("Josh Gordon's links", "links") ; 
?>  

          <div class="page-header">
            <h1>
              Some links... <small>from around the web...</small>
            </h1>
          </div>
<?php
echo shell_exec("markdown links.md"); 

bottom() ;

?> 
