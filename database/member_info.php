<?php
    $connection = pg_connect(getenv("DATABASE_URL"));
    pg_select_db($connection,'geekhav');
?>

