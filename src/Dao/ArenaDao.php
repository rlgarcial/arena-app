<?php

require_once('../Utils/DatabaseConnection.php');
require_once('../Entity/Arena.php');
//use ArenaApp\Utils\DatabaseConnection;
class ArenaDao
{
    private $ALL_ARENA_LIST = "SELECT Id, Descript, Price, StatusAr FROM arenas;";
    private $ARENA_BY_ID = "SELECT Id, Descript, Price FROM Arena WHERE StatusAr = :_statusAr";


    function getArenaList()
    {
        $connectionStatus = DatabaseConnection::getConnection();
        $connection = null;
        if(null != $connectionStatus['connection'])
        {
            $connection = $connectionStatus['connection'];
            $rawResult = $connection->prepare($this->ALL_ARENA_LIST);
            $rawResult->execute();
            $arenaList = $rawResult->fetchAll(PDO::FETCH_CLASS,'Arena');

            foreach($arenaList as $arena)
            {
                $arenaOb = new Arena();
                $arenaOb->setId($arena->getId());
                $arenaOb->setDescript($arena->getDescript());
                $arenaOb->setPrice($arena->getPrice());
                $arenaOb->setStatusAr($arena->getStatusAr());

                $arenaList[] = $arenaOb;
            }

            return [
                'error_code' => 0,
                'data' => $arenaList
            ];
        }
        else
        {
            return [
                'error_code' => 500,
                'data' => $connection
            ];
        }
    }
}
?>