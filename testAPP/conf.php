<?php

$ezConf = array(
    //���ݿ����� 
    'db' => array(
        'state'=>true,
        'data'=>array(
            'host'=>'127.0.0.1',
            'user'=>'root',
            'password'=>'12345678',
            'dataBase'=>'test',
            'port'=>3389
        )
    ),
    // ��̬������
    'html'=>array(
        'state'=>true,
        'data'=>array(
            'path'=>'runtime/html',
            'rules'=>array(
                'ControlName/meth/para'=>'3600'
            )
        )
    ),
    // ���뻺������
    'codeCache'=> array(
        'stata'=>true,
        'data'=>array(
            'time'=>'3600'
        )
    ),
    // ��������
    'cache'=>array(
        'state'=>true,
        'data'=>array(
            'redis'=>array(
                'state'=>true,
                'data'=>array(
                    'host'=>'127.0.0.1',
                    'port'=>3389
                )
            )
        )
    ),
    // debug ����
    'debug'=> array(
        'stats'=>true
    ),
    // hook ����
    'hook'=>array(
        'state'=>true,
        'conf'=>array(
            'default'=>'control/methon',
            'control_Name1'=>array(
                'defualt'=>'control/methon',
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
    // log ����
    'log'=>array(
        'state'=>true,
        'conf'=>array(
            'path'=>'runtime/html'
        )
    ),
    // monitor����
    'monitor'=> array(
        'state'=>true,
        'data'=>array(
            'executeTime'=> true,
            'mem'=> true,
            'cpu'=>true
        )
    ),
    // exception����
    'exception'=>array(
        'state'=>true,
        'conf'=>array()
    ),
    // app ����
    'app'=>array(
    )
);