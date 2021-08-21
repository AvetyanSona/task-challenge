<?php

use app\libraries\Controller;
use app\models\Page;

class Pages extends Controller
{
    public function index($order = 'created_at',$by = 'desc',$page = NULL)
    {
        $pageModel = new Page;
        $pageModel->findAllTasks($order,$by,$page);
        if($pageModel->findAllTasks($order,$by,$page)){
            $data = $pageModel->findAllTasks($order,$by,$page);
            $this->view('pages/tasks', true, $data);
        }
    }
}

