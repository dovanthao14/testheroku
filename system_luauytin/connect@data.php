<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
// Lớp database
class DB
{
        // Các biến thông tin kết nối
    private $hostname = 'localhost',
            $username = 'getdatabase',
            $password = '',
            $dbname = 'getdatabase';
    // Biến lưu trữ kết nối
    public $cn = NULL;
 
    // Hàm kết nối
    public function connect()
    {
        $this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
       
    if (!$this->cn) {
        echo "Bảo trì hệ thống !";
        exit;
    }
    }
    // Hàm chống sql injection
    public function real_escape_string($sql = null) 
    {
        if ($this->cn) return mysqli_real_escape_string($this->cn, $sql);
    }
    // Hàm ngắt kết nối
    public function close()
    {
        if ($this->cn)
        {
            mysqli_close($this->cn);
        }
    }
 
    // Hàm truy vấn
    public function query($sql = null) 
    {       
        if ($this->cn)
        {
            mysqli_query($this->cn, $sql);
        }
    }
 
    // Hàm đếm số hàng
    public function num_rows($sql = null) 
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                $row = mysqli_num_rows($query);
                return $row;
            }   
        }       
    }

    // Hàm đếm tổng số hàng
    public function fetch_row($sql = null) 
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                $row = $query->fetch_row();
                return $row[0];
            }   
        }       
    }

    // Hàm lấy dữ liệu
    public function fetch_assoc($sql = null, $type)
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                if ($type == 0)
                {
                    // Lấy nhiều dữ liệu gán vào mảng
                    while ($row = mysqli_fetch_assoc($query))
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                else if ($type == 1)
                {
                    // Lấy một hàng dữ liệu gán vào biến
                    $data = mysqli_fetch_assoc($query);
                    return $data;
                }
            }       
        }
    }
 
    // Hàm lấy ID cao nhất
    public function insert_id()
    {
        if ($this->cn)
        {
            $count = mysqli_insert_id($this->cn);
            if ($count == '0')
            {
                $count = '1';
            }
            else
            {
                $count = $count;
            }
            return $count;
        }
    }
 
    // Hàm charset cho database
    public function set_char($uni)
    {
        if ($this->cn)
        {
            mysqli_set_charset($this->cn, $uni);
        }
    }
    // Hàm lấy tên thẻ cào
    public function string_card($id = null) 
    {
        if ($this->cn)
        {
            $sql = "SELECT name FROM `card` WHERE `id` = '{$id}' LIMIT 1";
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                return mysqli_fetch_assoc($query)['name'];
            }   
        }       
    }
    // Hàm check token login fb
    public function check_token($uid,$token) 
    {
        if ($this->cn)
        {   $time = time()-20;
            $sql = "SELECT COUNT(id) FROM `accounts` WHERE `username` = '".$uid."' AND `token` = '".$token."' AND `expired_token` >= ".$time;
            $query = mysqli_query($this->cn, $sql);
            if ($query && $query->fetch_row()[0] == 1){
                return true;
            }  
            return false;
        }       
    }
}
 
?>