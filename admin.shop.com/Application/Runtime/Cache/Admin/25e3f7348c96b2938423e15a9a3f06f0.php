<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - <?php echo ($meta_title); ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://admin.shop.com/Public/CSS/general.css" rel="stylesheet" type="text/css" />
<link href="http://admin.shop.com/Public/CSS/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.upload-pre-item img{
		width:150px;
	}

	.upload-pre-item{
		display:inline-block;
	}

	.upload-pre-item a{
		position:relative;
		top:5px;
		right:15px;
		float:right;
		color:red;
		font-size:16px;
		text-decoration:none;
	}

</style>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U('index');?>">商品列表</a>
    </span>
    <span class="action-span1"><a href="<?php echo U('Index/main');?>">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo ($meta_title); ?> </span>
</h1>
    <div style="clear:both"></div>

<div class="tab-div">
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="<?php echo U();?>" method="post">
            <table width="90%" id="general-table" align="center">
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="name" value="<?php echo ($row["name"]); ?>"size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">商品货号： </td>
                    <td>
                        <?php if(empty($row)): ?><input type="text" name="sn" value="<?php echo ($row["sn"]); ?>" size="20"/>
                        <span id="goods_sn_notice"></span><br />
                        <span class="notice-span"id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span>
                        <?php else: ?>
                            <?php echo ($row["sn"]); endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品分类：</td>
                    <td>
                        <!--新增页面时,parent_id和paent_name为空,编辑页面时,parent_id和parent_name回显-->
                        <!--是通过ztree控制赋值的,点击时通过ztree给parent_name和parent_id赋值-->
                        <input type='text' name='goods_category_name'  id="goods_category_name" disabled="disabled"/>
                        <input type="hidden" name="goods_category_id" id="goods_category_id" value=""/>
                        <span class="require-field">*</span>
                        <ul style="border: 1px solid #ccc;width:183px" id="tree" class="ztree"></ul>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                        <?php echo arr2select($brand_list,'id','name','brand_id');?>
                    </td>
                </tr>
                <tr>
                    <td class="label">供货商：</td>
                    <td>
                        <?php echo arr2select($supplier_list,'id','name','supplier_id');?>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input type="text" name="shop_price" value="<?php echo ($row["shop_price"]); ?>" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
				<tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="market_price" value="<?php echo ($row["market_price"]); ?>" size="20" />
                    </td>
                </tr>
                <tr>
                    <td class="label">库存：</td>
                    <td>
                        <input type="text" name="stock" size="8" value="<?php echo ($row["stock"]); ?>"/>
                    </td>
                </tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_on_sale" value="1"  class="is_on_sale"/> 是
                        <input type="radio" name="is_on_sale" value="0"  class="is_on_sale"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">商品状态：</td>
                    <td>
                        <input type="checkbox" name="is_best" value="1"  class="goods_status"/> 精品
                        <input type="checkbox" name="is_new" value="2"  class="goods_status"/> 新品
                        <input type="checkbox" name="is_hot" value="4"  class="goods_status"/> 热销
                    </td>
                </tr>
                <tr>
                    <td class="label">推荐排序：</td>
                    <td>
                        <input type="text" name="sort" size="5" value="<?php echo ($row["sort"]); ?>"/>
                    </td>
                </tr>
				<tr>
					<td></td>
					<td><hr /></td>
				</tr>
				<tr>
                    <td class="label">商品详细描述：</td>
                    <td>
                        <textarea name="content" cols="40" rows="3" id="ueditor"><?php echo ($row["content"]); ?></textarea>
                    </td>
                </tr>



				<tr>
					<td></td>
					<td><hr /></td>
				</tr>

				<tr>
                    <td class="label">商品相册：</td>
                    <td>
                        <div class="upload-img-box">
							<div class="upload-pre-item">
								<img src="http://admin.shop.com/Public/IMG/goods1.jpg"/>
								<a href="#">×</a>
							</div>

							<div class="upload-pre-item">
								<img src="http://admin.shop.com/Public/IMG/goods2.jpg"/>
								<a href="#">×</a>
							</div>

							<div class="upload-pre-item">
								<img src="http://admin.shop.com/Public/IMG/goods3.jpg"/>
								<a href="#">×</a>
							</div>
						</div>

						<div>
							<input type="file" />
						</div>
                    </td>
                </tr>
            </table>

			
            <div class="button-div">
                <input type="hidden" value="<?php echo ($row["id"]); ?>" name="id">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

<link rel="stylesheet" type="text/css" href="http://admin.shop.com/Public/EXT/ztree/css/zTreeStyle/zTreeStyle.css" />
<script type="text/javascript" src="http://admin.shop.com/Public/EXT/ztree/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/EXT/ztree/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/EXT/layer/layer.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/EXT/ueditor/ueditor.my.config.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/EXT/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="http://admin.shop.com/Public/EXT/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">

    $(function(){
        var ue = UE.getEditor('ueditor');  //初始化富文本编辑器
        var setting = {
            data: {
                simpleData: {     //参数配置
                    enable: true,   //true 表示 开启 异步加载模式
                    pIdKey: "parent_id", //父级id字段
                }
            },
            callback: {       //回调函数
                onClick: function(event, treeId, treeNode){
                    $('#goods_categoty_id').val(treeNode.id);      //返回id
                    $('#goods_categoty_name').val(treeNode.name);  //返回父级名
                },
                beforeClick:function(treeid,tree_node){
                    if(tree_node.isParent){
                        layer.msg('不能选择枝干节点',{icon:5,time:1000});
                        return false;
                    }
                }
            }
        };
        var zNodes =<?php echo ($goods_category_list); ?>;   //准备节点数据
//            $(':input[name=status]').val([<?php echo ((isset($data["status "]) && ($data["status "] !== ""))?($data["status "]): 1); ?>]); //状态单选框赋值,回显选中
            $obj=$.fn.zTree.init($("#tree"), setting, zNodes);   //zTree 初始化方法，创建 zTree 必须使用此方法
            $obj.expandAll(true);        //默认全展开
        <?php if(!empty($row)): ?>$('.brand_id').val([<?php echo ($row["brand_id"]); ?>]);
            $('.supplier_id').val([<?php echo ($row["supplier_id"]); ?>]);
            $('.is_on_sale').val([<?php echo ($row["is_on_sale"]); ?>]);
            var goods_status=[];
            if(<?php echo ($row["is_best"]); ?>){
                goods_status.push(1);
            }
             if(<?php echo ($row["is_new"]); ?>){
                goods_status.push(2);
            }
            if(<?php echo ($row["is_hot"]); ?>){
                goods_status.push(4);
            }
            $('.goods_status').val(goods_status);
            var category_node=$obj.getNodeByParam('id', <?php echo ($row["goods_category_id"]); ?>);
                $obj.selectNode(category_node);
                $('#goods_category_id').val(category_node.id);
                $('#goods_category_name').val(category_node.name);
            <?php else: ?>
            $('.is_on_sale').val([1]);<?php endif; ?>
    });
</script>
</body>
</html>