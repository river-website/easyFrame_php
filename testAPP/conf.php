<?php

$GLOBALS['ezConf'] = array(
    // Êı¾İ¿âÅäÖÃ
    'db' => array(
        'state' => true,
        'conf' => array(
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '3f4/.45FV',
            'dataBase' => 'test',
            'port' => 3306
        )
    ),
    // redis»º´æÅäÖÃ
    'cacheRedis'=>array(
        'state'=>true,
        'conf'=>array(
            'host'=>'127.0.0.1',
            'port'=>6379,
            'time'=>600
        )
    ),
    // ÎÄ¼ş»º´æÅäÖÃ
    'cacheFile'=>array(
        'state'=>true,
        'conf'=>array(
            'path'=>'/runtime/cache/file',
            'time'=>3000
        )
    ),
    // shmÄÚ´æ¹²Ïí»º´æÅäÖÃ
    'cacheShm'=>array(
        'state'=>true,
        'conf'=>array(
            'shmKey'=>10000,
            'size'=>100000,
            'auth'=>0666
        )
    ),
    // html¾²Ì¬»¯»º´æÅäÖÃ
    'cacheHtml'=>array(
        'state'=> false,
        'conf' => array(
            'path' => '/runtime/cache/html',
            'rules' => array(
                'default' => 600,
                'testAction' => array(
                    'default' => 600,
                    'methon_name1' => 50,
                    'methon_name2' => 80
                ),
                'control_Name2' => array(
                    'default' => 600,
                    'methon_name1' => 80,
                    'methon_name2' => 100
                )
            )
        )
    ),
    // ºóÌ¨·şÎñÅäÖÃ£¬´Ë½ø³Ì»áÒ»Ö±´æÔÚ
    'server'=>array(
        'state'=>true,
        'conf'=>array(
            'ip'=>'127.0.0.1',
            'port'=>4455
        )
    ),
    // Â·ÓÉÖØĞ´Î±¾²Ì¬ÅäÖÃ
    'rewrite'=>array(
        'state'=>true,
        'conf'=>array(
            't/(.*)'=>'testAction/$1',
            'u/(\d+)'=>'testAction/hook/$1'
        )
    ),
    // hook¹³×ÓÅäÖÃ
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
    // Òì³£ÅäÖÃ
    'exception' => array(
        'state' => true,
        'conf' => array()
    ),
    // µ÷ÊÔÅäÖÃ
    'debug' => array(
        'state' => true,
        'conf' => array()
    ),
    // ÈÕÖ¾ÅäÖÃ
    'log' => array(
        'state' => true,
        'conf' => array(
            'path' => '/runtime/log'
        )
    ),
    // ÏûÏ¢¶ÓÁĞÅäÖÃ
    'msgQueue'=>array(
        'state'=>true,
        'conf'=>array(
            'maxMsg'=>1000

        )
    ),
    // php´úÂë»º´æ
    'opcode'=>array(
        'state'=>true,
        'conf'=>array()
    ),
    // ¼à¿ØÅäÖÃ
    'monitor' => array(
        'state' => true,
        'conf' => array(
            'executeTime' => true,
            'mem' => true,
            'cpu' => true
        )
    ),
    // Íâ²¿appÅäÖÃ
    'outApp'=>array(
        'state'=>true,
        'conf'=>array(
            'app1'=>'path1'
        )
    ),
    // appÓÃ»§ÅäÖÃ
    'app' => array(
        'state'=>true,
        'conf'=>array()
    )
);
