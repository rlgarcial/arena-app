<?php

require_once('../Service/ArenaService.php');
require_once('../Helper/ControllerHelper.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];

if(!is_null($requestMethod)) {
    $requestKeys = ['REQUEST_URL', 'OBJECT_ID', 'OBJECT_DATA'];
    $requestValues = ControllerHelper::getHttpRequestValues($requestMethod, $requestKeys);
    handleHttpRequest($requestMethod,$requestValues);
}

function handleHttpRequest($requestMethod, $requestValues)
{
    switch($requestMethod)
    {
        case 'GET':
        arenaListAction($requestValues);
        break;
        case 'POST':
        addArenaAction($requestValues);
        break;
        case 'PUT':
        editArenaAction($requestValues);
        break;
        case 'DELETE':
        deleteArenaAction($requestValues);
        break;
    }
}

function arenaListAction($requestValues)
{
    $arenaListURL = '/arena/list';
    $requestURL = $requestValues[0]['REQUEST_URL'];
    if(!is_null($requestURL) && $requestURL == $arenaListURL)
    {
        $arenaService = new ArenaService();
        $arenaList = $arenaService->getArenaList();
        echo json_encode($arenaList);
    }
    
}

?>