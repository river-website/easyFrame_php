<?php
$ezConf = array(
    //Êı¾İ¿âÅäÖÃ
    'db' => array(
        'state' => true,
        'conf' => array(
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '12345678',
            'dataBase' => 'test',
            'port' => 3306
        )
    ),
    // ¾²Ì¬»¯ÅäÖÃ
    'html' => array(
        'state' => true,
        'conf' => array(
            'path' => '/runtime/cache/html',
            'rules' => array(
                'default' => 600,
                'testAction' => array(
                    'default' => 'testAction/hook',
                    'methon_name1' => 'control/methon',
                    'methon_name2' => 'control/methon'
                ),
                'control_Name2' => array(
                    'default' => 'control/methon',
                    'methon_name1' => 'control/methon',
                    'methon_name2' => 'control/methon'
                )
            )
        )
    ),
    // ´úÂë»º´æÅäÖÃ
    'codeCache' => array(
        'state' => true,
        'conf' => array(
            'time' => '3600'
        )
    ),
    // Î±¾²Ì¬ÅäÖÃ
    'rewrite'=>array(
        'state'=>true,
        'conf'=>array(
            't/(.*)'=>'testAction/$1',
            'u/(\d+)'=>'testAction/hook/$1'
        )
    ),
    // »º´æÅäÖÃ
    'cache' => array(
        'state' => true,
        'conf' => array(
            'redis' => array(
                'state' => true,
                'data' => array(
                    'host' => '127.0.0.1',
                    'port' => 3389
                )
            )
        )
    ),
    'redis'=>array(
        'state'=>true,
        'conf'=>array(
            'host'=>'127.0.0.1',
            'port'=>3306
        )
    ),
    'file'=>array(
        'state'=>true,
        'conf'=>array(
            'path'=>'/runtime/cache/file',
            'time'=>3000
        )
    ),
    'opcode'=>array(
        'state'=>true,
        'conf'=>array(

        )
    ),
    'shmop'=>array(
        'state'=>true,
        'conf'=>array(

        )
    ),
    // debug ÅäÖÃ
    'debug' => array(
        'state' => true,
        'conf' => array()
    ),
    // hook ÅäÖÃ
    'hook' => array(
        'state' => true,
        'conf' => array(
            'default' => 'testAction/hook',
            'testAction' => array(
                'default' => 'testAction/hook',
                'methon_name1' => 'control/methon',
                'methon_name2' => 'control/methon'
            ),
            'control_Name2' => array(
                'default' => 'control/methon',
                'methon_name1' => 'control/methon',
                'methon_name2' => 'control/methon'
            )
        )
    ),
    // log ÅäÖÃ
    'log' => array(
        'state' => true,
        'conf' => array(
            'path' => '/runtime/log'
        )
    ),
    // monitorÅäÖÃ
    'monitor' => array(
        'state' => true,
        'conf' => array(
            'executeTime' => true,
            'mem' => true,
            'cpu' => true
        )
    ),
    // exceptionÅäÖÃ
    'exception' => array(
        'state' => true,
        'conf' => array()
    ),
    // app ÅäÖÃ
    'app' => array()
);
