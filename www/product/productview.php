<? 
require "../inc/config.php";
require "../inc/pagenav.class.php";



//news content
$strSQL = "select title,content from productinfo where id_prodinfo='".$_GET[pid]."'  " ;
$objDB->Execute($strSQL);
$onenews=$objDB->fields();


//取出目录列表
$strSQL="SELECT id_proddir,name FROM productdir WHERE fatherid='1' and dele='1' order by ordernum ASC";
$objDB->Execute($strSQL);
$arrnewsdir_ch=$objDB->GetRows();

//如果目录存在 查出目录名
if(isset($_GET[pdir])){
$strSQL="SELECT id_proddir,name from productdir WHERE id_proddir='".$_GET[pdir]."' and dele='1' ";
$objDB->Execute($strSQL);
$onenewsdir_ch=$objDB->fields();
}

?>
﻿<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
<meta http-equiv="Cache-Control" content="no-cache"></meta>
<title><?php echo $setinfo[title];?></title>
<style type="text/css">
body,h1,h2,tr,td,h3,ul,ol,form,p{margin:0 0;padding:0 0;font-size:12px;;line-height:1.25em;}
body{ background:#797979;}
a:link{color:#000000;}
li{padding:2px 2px;}
img{border:0px;} 
ul,ol{list-style:none;}
li{border-bottom:1px solid #eee;}
a{color:#00E; text-decoration:none;}
a:link, a:visited{color:#00E; text-decoration:none;}
.c{border-top:2px solid #ff6500;}
.c1{vertical-align:middle;} 
.n{background:#efefef;padding:2px 0;margin:1px 0;}
.nf{color:#9a9a9a;}
.red{color:#FF0000;}
.vcent {vertical-align:middle;}
.ft{border-top:2px solid #f77c23;margin-top:2px;}
.logo{ text-align:center;}
.mainbox{ width:320px; height:auto; background:#FFFFFF;}
.bar{height:22px; width:320px; background:#C8E8F4;float:left;}
.pagenav{height:22px; width:320px;float:left; text-align:center}
.bar_txt{ margin-left:3px; margin-top:5px;}
.footer {line-height:23px; height:auto; text-align:center; border-top:1px solid #999999; background:#c9daef}
.indexlist{ height:auto;}
.clear{ clear:both;}


.indexbox320{float:left;margin-top:5px;margin-bottom:10px;margin-left:5px;width:310px; }

.indexmenu { line-height:23px; border-bottom:1px solid #ccc; height:auto}
.indexmenu a{ color:#000000}
.indexmenu a:link{ color:#000000}
.indexmenu a:hover{ color:#000000}
.indexmenu a:visited{ color:#000000}



 
</style>
</head>
<body style="width:320px;margin:0 auto;">

<div class="mainbox">

<? require "../logo.php"; ?>

<div class="bar"><div class="bar_txt">
<? if(!isset($_GET[pdir])){?>
<a href="/">首页</a> > <a href="/product/products.php">产品中心</a>
<? }else{?>
<a href="/">首页</a> > <a href="/product/products.php">产品中心</a> > <a href="#"><?=$onenewsdir_ch[name];?></a>
<? }?>
</div>
</div>

<div class="indexmenu" style="text-align:right">
<? for($i=0;$i<sizeof($arrnewsdir_ch);$i++){?>
<a href="/product/products.php?pdir=<?=$arrnewsdir_ch[$i][id_proddir]?>"><strong><?=$arrnewsdir_ch[$i][name]?></strong></a> | 
<? }?>
</div>

<div class="indexlist">
    <div style="text-align:center; color:#ff0000; height:23px;line-height:23px;"><strong><?=$onenews[title];?></strong></div>
    <div class="indexbox320"><?=$onenews[content];?></div>
</div>
<a href="news.php">返回新闻</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php">返回首页</a><br/>
<div class="clear"></div>   
  
<? require "../footer.php"; ?>

</div><!--end mainbox!-->

</body>
</html>