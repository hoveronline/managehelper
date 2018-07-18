<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" content="ie=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store, must-revalidate">
    <meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT">
    <meta http-equiv="expires" content="0">
	<title><?php echo ($attributes["title"]); ?></title>
	<!-- COMMON JS -->
	<script src="$path/js/common/resource/common-methods.js"></script>
    <script src="../../js/libs/jquery/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="../../js/libs/easyui-1.5.1/jquery.easyui.min.js" type="text/javascript"></script>    
    <script src="../../js/libs/easyui-1.5.1/jquery.Easyui.default.js" type="text/javascript"></script>
    <script src="../../js/libs/easyui-1.5.1/jquery.extend.js" type="text/javascript"></script>
    <script src="../../js/libs/easyui-1.5.1/jquery.Easyui.validate.js" type="text/javascript"></script>
    <script src="../../js/libs/easyui-1.5.1/extension/datagrid-detailview.js" type="text/javascript"></script>
    <link href="../../js/libs/easyui-1.5.1/themes/abt/easyui.css" rel="stylesheet" type="text/css">
    <link href="../../css/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/themes/abt/common.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/themes/abt/custom.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/themes/abt/style.css?v=3.0.1215" rel="stylesheet" type="text/css">
</head>
<SCRIPT LANGUAGE="JavaScript">
    $(function () {
        $('#<?php echo ($attributes["cate"]); ?>_<?php echo ($attributes["module"]); ?>_<?php echo ($attributes["type"]); ?>_tree').tree({
            url: './data/device_data.json',
            onClick:function(node){
                $('#policy_list').datagrid({
                    pageNumber:1,
                    url:'./data/device_data.json',
                    queryParams:{
                        categoryid:node.id
                    }
                });
            }
        });
		
		var <?php echo ($attributes["cate"]); ?>_<?php echo ($attributes["module"]); ?>_<?php echo ($attributes["type"]); ?>_list = $("#<?php echo ($attributes["cate"]); ?>_<?php echo ($attributes["module"]); ?>_<?php echo ($attributes["type"]); ?>_list").datagrid({
			method: 'get',
			url: './data/data.json',
			border: false,
			pagination: true,
			singleSelect: false,
			toolbar: '#toolbar_<?php echo ($attributes["cate"]); ?>_<?php echo ($attributes["module"]); ?>_<?php echo ($attributes["type"]); ?>',
			rownumbers: true,
			fitColumns: true,
			fit:true,
			pageSize: 20,
			striped: true,
			selectOnCheck: true,
			checkOnSelect: true,
			rowStyler:function(rowIndex,rowData){  
				if((rowIndex+1) % 2 == 0){  
					return 'background-color:#F2F2F2;';  
				}  
			 }, 
			queryParams: {
				name: $('#obj_app_searchText').val(),
			},
			columns: [[
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($Newline); ?>
	{field: '<?php echo ($vo["@attributes"]["field"]); ?>', title: '<?php echo ($vo["@attributes"]["title"]); ?>'<?php if(isset($vo["@attributes"]["width"])): ?>,  width: '<?php echo ($vo["@attributes"]["width"]); ?>%'<?php endif; ?>,formatter:format_<?php echo ($vo["@attributes"]["field"]); ?>},
				<?php echo ($Newline); endforeach; endif; else: echo "" ;endif; ?>]],
		});
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($Newline); ?>
		function format_<?php echo ($vo["@attributes"]["field"]); ?>(value,row){
			return value;
		}
<?php echo ($Newline); endforeach; endif; else: echo "" ;endif; ?>
</SCRIPT>
<body>
<div class="easyui-tabs main-tabs" data-options="fit:true, border:false" id="obj_app_tab">
	<div title="策略列表" data-options="fit:true, border:false" style="padding: 5px;">
	 <div class="easyui-layout" data-options="fit:true, border:false">
	  <div data-options="region:'west',split:true,iconCls:'fa fa-cubes'" title="设备组" style="width:220px;">
	   <ul id="<?php echo ($attributes["cate"]); ?>_<?php echo ($attributes["module"]); ?>_<?php echo ($attributes["type"]); ?>_tree"></ul>
	  </div>
	  <div data-options="region:'center',title:'策略',iconCls:'fa fa-navicon'">
		<div class="easyui-tabs inner-tabs" id="obj_app_tab" data-options="fit:true, border:false">
			<div title="访问控制" data-options="fit:true, border:false">
				<table id="policylist_policy_list" class="easyui-datagrid"></table>
			</div>
			<div title="ACL策略" data-options="fit:true, border:false">
				<table id="policylist_acl_list" class="easyui-datagrid"></table>
			</div>
			<div title="NAT策略" data-options="fit:true, border:false">
				<table id="policylist_nat_list" class="easyui-datagrid"></table>
			</div>
			<div title="静态路由" data-options="fit:true, border:false">
				<table id="policylist_nat_list" class="easyui-datagrid"></table>
			</div>
			<div title="策略路由" data-options="fit:true, border:false">
			</div>
			<div title="策略表" data-options="fit:true, border:false">
			</div>
		</div>
	 </div>
	</div>
	<div id="toolbar_<?php echo ($attributes["cate"]); ?>_<?php echo ($attributes["module"]); ?>_<?php echo ($attributes["type"]); ?>" style="display:none;">
		<span>
		<input type="text" id='obj_app_search' style='width: 300px;'/>
		</span>
	</div>
</div>
</body>
</HTML>