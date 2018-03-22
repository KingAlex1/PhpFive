404 not found
<br>

<?php if (file_exists('bedug')) : ?>
    Error : <br>
    <pre>
    <?php
    echo 'line :' . $e->getLine() . "<br>";
    echo 'line :' . $e->getFile() . "<br>";
    echo $e->getMessage() . "<br>";
    echo $e->getTraceAsString();
endif;
