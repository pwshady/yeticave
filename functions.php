<?php

function include_bloc ($url, $date)
{
    if (isset($date))
    {
        foreach($date as $key => $value)
        {
            $$key = $value;
        };
    };
    ob_start();
    $content = require_once $url;
    return ob_get_clean();
};

function next_time()
{
    date_default_timezone_set('Europe/Moscow');

    return floor((strtotime("tomorrow 00:00:00") - time())/3600) . "h: " . floor(((strtotime("tomorrow 00:00:00") - time())%3600)/60) . "m: " . ((strtotime("tomorrow 00:00:00") - time())%3600)%60 . "s";
}

?>