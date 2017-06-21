<?php

$ezConf = array(
    //Êı¾İ¿âÅäÖÃ 
    'db' => array(
        'state'=>true,
        'conf'=>array(
            'host'=>'127.0.0.1',
            'user'=>'root',
            'password'=>'123456',
            'dataBase'=>'test',
            'port'=>3306
        )
    ),
    // ¾²Ì¬»¯ÅäÖÃ
    'html'=>array(
        'state'=>true,
        'conf'=>array(
            'path'=>'runtime/html',
            'rules'=>array(
                'ControlName/meth/para'=>'3600'
            )
        )
    ),
    // ´úÂë»º´æÅäÖÃ
    'codeCache'=> array(
        'stata'=>true,
        'conf'=>array(
            'time'=>'3600'
        )
    ),
    // »º´æÅäÖÃ
    'cache'=>array(
        'state'=>true,
        'conf'=>array(
            'redis'=>array(
                'state'=>true,
                'data'=>array(
                    'host'=>'127.0.0.1',
                    'port'=>3389
                )
            )
        )
    ),
    // debug ÅäÖÃ
    'debug'=> array(
        'state'=>true
    ),
    // hook ÅäÖÃ
    'hook'=>array(
        'state'=>true,
        'conf'=>array(
            'default'=>'testAction/hook',
            'testAction'=>array(
                'defualt'=>'testAction/hook',
                'methon_name1'=>'control/methon',
                'methon_name2'=>'control/methon',
            ),
            'control_Name2'=>array(
                'defualt'=>'control/methon',
                'methon_name1'=>'control/methon',
                'methon_name2'=>'control/methon',
            )
        )
    ),
    // log ÅäÖÃ
    'log'=>array(
        'state'=>true,
        'conf'=>array(
            'path'=>'runtime/html'
        )
    ),
    // monitorÅäÖÃ
    'monitor'=> array(
        'state'=>true,
        'conf'=>array(
            'executeTime'=> true,
            'mem'=> true,
            'cpu'=>true
        )
    ),
    // exceptionÅäÖÃ
    'exception'=>array(
        'state'=>true,
        'conf'=>array()
    ),
    // app ÅäÖÃ
    'app'=>array(
    )
);