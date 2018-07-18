<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$objpath = 'dst_code/';
		$config_file = 'config_data/cloudy/security_ability.xml';
		$project = 'ui_standard';

		if($fp = fopen($config_file, 'r')) {
			$template = fread( $fp, filesize($config_file));
		}
		fclose($fp);

		$config = $this->xmlToArray($template);

		$datagrid = $config['datagrid']['item'];
		$attributes = $config['@attributes'];
		$this->assign('list',$datagrid);
		$this->assign('attributes',$attributes);
		$key_value = "table";

		$config_array = array(
			array("cn_name"=>"操作表格","key_value"=>"table","tmpl"=>"table"),	
			array("cn_name"=>"导航表格","key_value"=>"table_nav","tmpl"=>"table"),	
			array("cn_name"=>"树形表格","key_value"=>"table_tree","tmpl"=>"table"),	
			array("cn_name"=>"多级表头","key_value"=>"table_multi","tmpl"=>"table"),	
			array("cn_name"=>"表单","key_value"=>"form","tmpl"=>"table"),	
			array("cn_name"=>"窗口","key_value"=>"windows","tmpl"=>"table"),	
			array("cn_name"=>"提示","key_value"=>"tips","tmpl"=>"table"),	
			array("cn_name"=>"图表","key_value"=>"charts","tmpl"=>"table"),	
			array("cn_name"=>"向导","key_value"=>"wizard","tmpl"=>"table"),	

			array("cn_name"=>"字体","key_value"=>"font","tmpl"=>"ui"),	
			array("cn_name"=>"对齐","key_value"=>"align","tmpl"=>"ui"),	
			array("cn_name"=>"颜色","key_value"=>"color","tmpl"=>"ui"),	
			array("cn_name"=>"边距","key_value"=>"margin","tmpl"=>"ui"),	

			array("cn_name"=>"操作图标","key_value"=>"font","tmpl"=>"icon"),	

			array("cn_name"=>"页面","key_value"=>"home","tmpl"=>"page"),	
			array("cn_name"=>"登录","key_value"=>"login","tmpl"=>"page"),	
			array("cn_name"=>"导航","key_value"=>"nav","tmpl"=>"page"),	
		);
		$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 26px }</style><div style="padding: 24px 48px;">','utf-8');
		
		foreach( $config_array as $array ){

			$this->assign('cn_name',$array[cn_name]);
			$this->assign('key_value',$array[key_value]);
			$this->buildHtml($array[key_value].'.html', HTML_PATH.$project.'/html/', $array[tmpl], 'utf8');
		}
		$this->buildHtml($key_value.'.html', HTML_PATH.$project.'/html/', 'table', 'utf8');

		$this->show('<p>生成完毕！</p>','utf-8');
		$this->show('</div>','utf-8');
    }
	public function demodata(){
		$objpath = 'dst_code/';
		$config_file = 'config_data/cloudy/security_ability.xml';
		$project = 'cloudy';		

		if($fp = fopen($config_file, 'r')) {
			$template = fread( $fp, filesize($config_file));
		}
		fclose($fp);
		$config = $this->xmlToArray($template);

		$datagrid = $config['datagrid']['item'];
		$attributes = $config['@attributes'];
		
		$array = array();
		foreach($datagrid as $i => $var){
			$array[$i][field] = $var['@attributes'][field] ;
			$array[$i][type] = $var['@attributes'][type] ;
			$array[$i][demo_data] = $var['@attributes'][demo_data] ;
		}

		$this->assign('data',$array);
		$this->assign('attributes',$attributes);


		$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 26px }</style><div style="padding: 24px 48px;">','utf-8');
		
		$this->buildHtml('test.json', HTML_PATH.$project.'/json/', 'test.json', 'utf-8');

		$this->show('<p>生成完毕！</p>','utf-8');
		$this->show('</div>','utf-8');
		
	}
	public function generate(){
		
		$dir = '/xampp/htdocs/'.__ROOT__."/config_data/";
		$files = scandir($dir);
		$f = F($files);

		echo "<pre>";

		foreach($files as $file){
			if($file=='.'||$file=='..')
				continue;
			
			if($fp = fopen($dir.$file, 'r')) {
				$template = fread( $fp, filesize($dir.$file));
			}
			fclose($fp);
			$config = $this->xmlToArray($template);
			echo $file."<br>";
			print_r($config);
		}
		return;
	}
    function xmlToArray($xml)
    {    
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
        return $values;
    }

}