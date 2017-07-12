<?php

$GLOBALS['ezConf'] = array(
    // ���ݿ�����
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
    // redis��������
    'cacheRedis'=>array(
        'state'=>true,
        'conf'=>array(
            'host'=>'127.0.0.1',
            'port'=>6379,
            'time'=>600
        )
    ),
    // �ļ���������
    'cacheFile'=>array(
        'state'=>true,
        'conf'=>array(
            'path'=>'/runtime/cache/file',
            'time'=>3000
        )
    ),
    // shm�ڴ湲��������
    'cacheShm'=>array(
        'state'=>true,
        'conf'=>array(
            'shmKey'=>10000,
            'size'=>100000,
            'auth'=>0666
        )
    ),
    // html��̬����������
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
    // ��̨�������ã��˽��̻�һֱ����
    'server'=>array(
        'state'=>true,
        'conf'=>array(
            'ip'=>'127.0.0.1',
            'port'=>4455
        )
    ),
    // ·����дα��̬����
    'rewrite'=>array(
        'state'=>true,
        'conf'=>array(
            't/(.*)'=>'testAction/$1',
            'u/(\d+)'=>'testAction/hook/$1'
        )
    ),
    // hook��������
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
    // �쳣����
    'exception' => array(
        'state' => true,
        'conf' => array()
    ),
    // ��������
    'debug' => array(
        'state' => true,
        'conf' => array()
    ),
    // ��־����
    'log' => array(
        'state' => true,
        'conf' => array(
            'path' => '/runtime/log'
        )
    ),
    // ��Ϣ��������
    'msgQueue'=>array(
        'state'=>true,
        'conf'=>array(
            'maxMsg'=>1000

        )
    ),
    // php���뻺��
    'opcode'=>array(
        'state'=>true,
        'conf'=>array()
    ),
    // �������
    'monitor' => array(
        'state' => true,
        'conf' => array(
            'executeTime' => true,
            'mem' => true,
            'cpu' => true
        )
    ),
    // �ⲿapp����
    'outApp'=>array(
        'state'=>true,
        'conf'=>array(
            'app1'=>'path1'
        )
    ),
    // app�û�����
    'app' => array(
        'state'=>true,
        'conf'=>array()
    )
);
