<?php
function disconnect($conn)
{
    mysqli_close($conn);
}
