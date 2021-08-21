<?php

namespace app\models;

use app\libraries\Model;

class Page extends Model
{

//Find All Tasks in DataBase
    public function findAllTasks($order,$by,$page)
    {
        $tasksSelect = "SELECT * FROM tasks";
        $this->db->query($tasksSelect);
        $this->db->resultSetArray();
        $page  = (isset($page) && $page < 100000)? (int) $page : 1;
        $perPage = 3;
        $start = $perPage * ($page - 1);
        $total = $this->db->rowCount();
        $totalPages = ceil($total / $perPage);
        $next = $page+1;
        $prev = $page-1;
        $sql  = "SELECT * FROM tasks ORDER BY $order $by LIMIT $start, $perPage";
        $this->db->query($sql);
        $this->db->resultSetArray();
        $paginatoinInfo = [
            "page"          => $page,
            "start"         => $start,
            "totalPages"    => $totalPages,
            "next"          => $next,
            "prev"          => $prev,
            "order"         => $order,
            "by"            => $by
        ];
        $res = [];
        $res['tasks'] = ($this->db->rowCount() > 0) ? $this->db->resultSet() : false;
        $res['paginator'] = $paginatoinInfo;
        return $res;
    }

}