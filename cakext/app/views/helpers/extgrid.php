<?php
/**
 *
 * Ext Grid Helper
 *
 * @package    Core
 * @subpackage Core
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-6-18
 * @version 1.0.0 $id$
 */
class ExtgridHelper extends AppHelper {

    var $helpers = array('Javascript','Html');
    var $appends = "";

    /**
    * Create Grid
    *
    * @param   array	$config 	array(
    *	'title' => 'Listing',
    * 	'ds' => 'http://xxxx.com/xxxx.php',
    * )
    * @return  XXX
    * @access public
    * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-6-18
    *
    */
    function create($config=array()) {

    	$data_source = $config['ds']['url'];
    	$data_source_keys = $config['ds']['keys'];
    	$title		 = $config['title'];
    	$perpage	 = $config['perpage'];
    	$headers	 = $this->_renderHeader($config['header']);
    	$toolbar	 = $this->_renderToolbar($config['toolbar']);
    	$display_msg = __("From {0} To {1} Total {2}", true);
    	$empty_msg	 = __("Not found records", true);

    	$inline_script = <<<EOD
Ext.onReady(function(){
	var ds = new Ext.data.Store({
		proxy : new Ext.data.HttpProxy({url:'{$data_source}'}),
        reader: new Ext.data.JsonReader({
			root: 'topics',
            totalProperty: 'totalCount',
            id: 'id'
			},[
			'id',{$data_source_keys}])
    });


	var colModel = new Ext.grid.ColumnModel([
		 {header:'ID',width:50,sortable:true,dataIndex:'id'}
		 {$headers}
		]);
	var tb = new Ext.Toolbar('north-div');

	tb.add({$toolbar});
	var grid = new Ext.grid.GridPanel({
				border:false,
				region:'center',
				loadMask: true,
				el:'center',
				title:'{$title}',
				store: ds,
				cm: colModel,
				autoScroll: true,
				bbar: new Ext.PagingToolbar({
					pageSize: {$perpage},
					store: ds,
					displayInfo: true,
					displayMsg: '{$display_msg}',
					emptyMsg: "{$empty_msg}"
        		})
            });
	var viewport = new Ext.Viewport({
        layout:'border',
        items:[{
			  border:false,
			  region:'north',
			  contentEl:'north-div',
			  tbar:tb,
			  height:26
			},
			grid
		]}
	);
	ds.load({params:{start:0, limit:{$perpage} }});
	{$this->appends}
});

EOD;

    	return '  <div id="north-div"></div><div id="center"></div>'.$this->Javascript->codeBlock($inline_script);
    }

    function _renderHeader($headers) {
    	if (is_array($headers)) {
    		$str = "";
    		$spliter = ",";
    		foreach ($headers as $item){
    			$str .= $spliter . "{";
    			$str .= "header:'{$item['label']}'";
    			$str .= ",dataIndex:'{$item['dataIndex']}'";
    			if ( isset($item['width']) ) {
    				$str .= ",width:{$item['width']}";
    			}
    			if ( isset($item['sortable']) ) {
    				$str .= ",sortable:{$item['sortable']}";
    			}

    			$str .= "}";
    		}

    		return $str;
    	}

    }

    function _renderToolbar($toolbar) {
    	if ( is_array($toolbar) ) {
    		$str 		= "";
    		$spliter	= "";
    		foreach ($toolbar as $item){
    			if (is_array($item)) {
    				$str .= $spliter . "{";
    				$spliter2 = "";
    				foreach ($item as $key=>$value){
    					if ($key == "function") {
    						$this->appends .= $value;
    					}
    					else {
	    					$str .= $spliter2 . "{$key}:{$value}";
	    					$spliter2 = ",";
    					}

    				}
    				$str .= "}";
    			}
    			else {
    				$str .= $spliter . $item;
    			}
    			$spliter	= ",";
    		}
    		return $str;
    	}

    }



}
?>