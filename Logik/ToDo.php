<?php

class ToDo
{
    private $tID;
    private $titel;
    private $deadline;
    private $zeitspanne;
    private $info;

    public function __construct($tID, $titel, $deadline = null, $zeitspanne = null, $info = null)
    {
        $this->tID = $tID;
        $this->titel = $titel;
        $this->deadline = $deadline;
        $this->zeitspanne = $zeitspanne;
        $this->info = $info;
    }

    public function getTID() {
        return $this->tID;
    }

    public function getTitel()
    {
        return $this->titel;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function getZeitspanne()
    {
        return $this->zeitspanne;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function __destruct(){
        // test Text: echo "Destroyed ToDo: ", $this->$titel
    }
}
?>