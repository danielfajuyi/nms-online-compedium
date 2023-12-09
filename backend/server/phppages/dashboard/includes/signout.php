<?php
    session_destroy();
    session_abort();
    session_destroy();

    header('location:http://localhost:3000');

?>