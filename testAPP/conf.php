<?php

$GLOBALS['ezConf'] = array(
	// 数据库配置
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
	// redis缓存配置
	'cacheRedis'=>array(
		'state'=>true,
		'conf'=>array(
			'host'=>'127.0.0.1',
			'port'=>6379,
			'time'=>600
		)
	),
	// 文件缓存配置
	'cacheFile'=>array(
		'state'=>true,
		'conf'=>array(
			'path'=>'/runtime/cache/file',
			'time'=>3000
		)
	),
	// shm内存共享缓存配置
	'cacheShm'=>array(
		'state'=>true,
		'conf'=>array(
			'shmKey'=>10000,
			'size'=>100000,
			'auth'=>0666
		)
	),
	// html静态化缓存配置
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
	// 路由重写伪静态配置
	'rewrite'=>array(
		'state'=>true,
		'conf'=>array(
			'^t/(.*)'=>'testAction/$1',
			'^u/(\d+)'=>'testAction/hook/$1',
            '^c/(.*)'=>'indexAction/crawl/$1'
		)
	),
	// hook钩子配置
	'hook' => array(
		'state' => true,
		'conf' => array(
			'default' => 'testAction/hook',
			'pc'=>array(
			    'default'=>'pc/baseInfo'
            ),
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
	// 异常配置
	'exception' => array(
		'state' => true,
		'conf' => array()
	),
	// 调试配置
	'debug' => array(
		'state' => true,
		'conf' => array()
	),
	// 日志配置
	'log' => array(
		'state' => true,
		'conf' => array(
			'path' => '/runtime/log'
		)
	),
	// view配置
	'view' => array(
		'state'	=>	true,
		'conf'	=>	array(
			'left'	=>'{#',
			'right'	=>'#}'
		)
	),
	// 消息队列配置
	'msgQueue'=>array(
		'state'=>true,
		'conf'=>array(
			'maxMsg'=>1000

		)
	),
	// php代码缓存
	'opcode'=>array(
		'state'=>true,
		'conf'=>array()
	),
	// 监控配置
	'monitor' => array(
		'state' => true,
		'conf' => array(
			'executeTime' => true,
			'mem' => true,
			'cpu' => true
		)
	),
	// 外部app配置
	'outApp'=>array(
		'state'=>true,
		'conf'=>array(
			'app1'=>'path1'
		)
	),
	// app用户配置
	'app' => array(
		'state'=>true,
		'conf'=>array()
	)
);
