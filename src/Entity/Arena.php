<?php

 class Arena {
    private $id;
    private $descript;
    private $price;
    private $statusAr;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescript()
    {
        return $this->descript;
    }

    public function setDescript($descript)
    {
        $this->descript = $descript;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getStatusAr()
    {
        return $this->statusAr;
    }

    public function setStatusAr($statusAr)
    {
        $this->statusAr = $statusAr;
    }
}

?>