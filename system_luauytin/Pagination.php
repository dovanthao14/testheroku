<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
class Pagination
{
    protected $_config = array(
        'current_page'  => 1,
        'total_record'  => 1,
        'total_page'    => 1,
        'limit'         => 9,
        'start'         => 9,
        'link_full'     => '',
        'link_first'    => '',
        'range'         => 5,
        'min'           => 0,
        'max'           => 0
    );
    function init($config = array())
    {
        foreach ($config as $key => $val) {
            if (isset($this->_config[$key])){
                $this->_config[$key] = $val;
            }
        }
        if ($this->_config['limit'] < 0) {
            $this->_config['limit'] = 0;
        }
        $this->_config['total_page'] = ceil($this->_config['total_record'] / $this->_config['limit']);
        if (!$this->_config['total_page']) {
            $this->_config['total_page'] = 1;
        }
        if ($this->_config['current_page'] < 1) {
            $this->_config['current_page'] = 1;
        }
         
        if ($this->_config['current_page'] > $this->_config['total_page']) {
            $this->_config['current_page'] = $this->_config['total_page'];
        }
        $this->_config['start'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];
        $middle = ceil($this->_config['range'] / 2);
        if ($this->_config['total_page'] < $this->_config['range']) {
            $this->_config['min'] = 1;
            $this->_config['max'] = $this->_config['total_page'];
        } else {
            $this->_config['min'] = $this->_config['current_page'] - $middle + 1;
            $this->_config['max'] = $this->_config['current_page'] + $middle - 1;
            if ($this->_config['min'] < 1) {
                $this->_config['min'] = 1;
                $this->_config['max'] = $this->_config['range'];
            } else if ($this->_config['max'] > $this->_config['total_page']) {
                $this->_config['max'] = $this->_config['total_page'];
                $this->_config['min'] = $this->_config['total_page'] - $this->_config['range'] + 1;
            }
        }
    }
    private function __link($page)
    {
        if ($page <= 1 && $this->_config['link_first']) {
            return $this->_config['link_first'];
        }
        return str_replace('{page}', $page, $this->_config['link_full']);
    }

    
    function html_list()
    {   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="page_account"> ';
            if ($this->_config['current_page'] > 1) {
                $p .= ' <p onclick="page = 1;load_list()">Đầu</p> ';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= ' <p onclick="page='.$i.';load_list()" class="active">'.$i.'</p> ';
                } else {
                    $p .= ' <p onclick="page='.$i.';load_list()">'.$i.'</p> ';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= ' <p onclick="page='.$i++.';load_list()">Cuối</p> ';
            }
            $p .= '</div>';
        }
        return $p;
    }
    
        
    function html_site()
    {   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="text-center m-b-20"><ul class="c-content-pagination c-theme">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="prev"><a onclick="page = 1;load_account()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="c-active"><a onclick="page='.$i.';load_account()">'.$i.'</a></li>';
                } else {
                    $p .= '<li><a onclick="page='.$i.';load_account()">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li><a onclick="page='.$this->_config['total_page'].';load_account()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
            }
            $p .= '</ul></div>';
        }
        return $p;
    }
    function html_pages()
    {   
        $p = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $p = '<div class="text-center m-b-20"><ul class="c-content-pagination c-theme">';
            if ($this->_config['current_page'] > 1) {
                $p .= '<li class="prev"><a onclick="page = 1;load_page()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>';
            }
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i++) {
                if ($this->_config['current_page'] == $i) {
                    $p .= '<li class="c-active"><a onclick="page='.$i.';load_page()">'.$i.'</a></li>';
                } else {
                    $p .= '<li><a onclick="page='.$i.';load_page()">'.$i.'</a></li>';
                }
            }
            if ($this->_config['current_page'] < $this->_config['total_page']) {
                $p .= '<li><a onclick="page='.$this->_config['total_page'].';load_page()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>';
            }
            $p .= '</ul></div>';
        }
        return $p;
    }
    

    function getConfig() {
    	return $this->_config;
    }
}
?>