<?php

class THM_Mitglied
{
private $uid;
private $rolle;

    public function __construct($uid, $rolle)
    {
        $this->uid = $uid;
        $this->rolle = $rolle;

    }

    public function getUid()
    {
        return $this->uid;
    }
    
    public function getRolle()
    {
        return $this->rolle;
    }

    public function __destruct()
    {
        // Test: wann und ob das Objekt zerstört wird
        // echo "Destroying: ".$this->uid;
    }

}

?>
