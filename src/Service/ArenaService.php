<?php 

require ('../Dao/ArenaDao.php');

class ArenaService
{
    public function __construct()
    {
        
    }

    function getArenaList() {
        $arenaDao = new ArenaDao();
        $arenaList = $arenaDao->getArenaList();
        
        return json_encode($arenaList);
    }
}
    
?>