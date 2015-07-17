<?php

class conexao
{

    /*
        Altere as variaveis a seguir caso necessario
    */

    private $db_host = '192.185.177.67:3306'; // servidor
    private $db_user = 'robug851_locdot'; // usuario do banco
    private $db_pass = 'adminlocdot123'; // senha do usuario do banco
    private $db_name = 'robug851_locdot'; // nome do banco

    private $con = false;

   
    public function connect() // estabelece conexao
    {
        if(!$this->con)
        {
            $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            if($myconn)
            {
                $seldb = @mysql_select_db($this->db_name,$myconn);
                if($seldb)
                {
                    $this->con = true;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }

   
    public function disconnect() // fecha conexao
    {
    if($this->con)
    {
        if(@mysql_close())
        {
                        $this->con = false;
            return true;
        }
        else
        {
            return false;
        }
    }
    }
      
}

?>