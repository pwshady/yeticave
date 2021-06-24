<?php

function include_bloc ($url, $date)
{
    if (isset($date))
    {
        for ($i = 0; $i < count($date); $i++)
        {
            $a = $date[$i]["name_variable"];
            $$a = $date[$i]["value_variable"];
        }
    }
    return require_once $url;
};

function next_time()
{
    date_default_timezone_set('Europe/Moscow');

    return floor((strtotime("tomorrow 00:00:00") - time())/3600) . "h: " . floor(((strtotime("tomorrow 00:00:00") - time())%3600)/60) . "m: " . ((strtotime("tomorrow 00:00:00") - time())%3600)%60 . "s";
}

?>