<?php

require_once('../Service/ArenaService.php');
//use ArenaApp\Service\ArenaService;

$_SERVER[];

if(!is_null($_POST["URL"]))
{
    switch($_POST["URL"])
    {
        case "/arena/list":
        arenaListAction();
        break;
    }
}

function arenaListAction()
{
    $arenaService = new ArenaService();
    $arenaList = $arenaService->getArenaList();
    echo json_encode($arenaList);
}

?>