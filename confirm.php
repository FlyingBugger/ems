<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js">
            <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
            <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<title>《网络安全法》有奖问答</title>
	</head>
	<style>
		a{
			list-style: none;
		}
	</style>

	<body>
	<div style="width:0px;height:0px;line-height:-1px;overflow:hidden; "><img src="cover.jpg"></div>
	<div class="container-fluid">
	<br/>
		<h3 style="    font-weight: bold;
    font-family: '微软雅黑';text-align:center;">《网络安全法》有奖知识问答</h3>
		<br/>

		<div class="">
			<b>活动时间：</b>2017年5月20日~6月10日
		</div>
		<div>
			<p style="    line-height: 32px;
    font-family: '微软雅黑';">
<?php
$mysql=new mysqli('5923bf9d7bf07.gz.cdb.myqcloud.com:15916','cdb_outerroot','102098hchab!@#$%','kaoshi');
$sql="SELECT * FROM x2_money WHERE 1 ORDER BY id DESC LIMIT 1";
$a=$mysql->query($sql);
$arrs=array();
while($arr=$a->fetch_array(MYSQLI_ASSOC))
        {
            $arrs[]=$arr;
        }


?>
				<b>活动内容：</b>为贯彻中央关于网络安全的方针政策和重要部署，在全社会营造“网络安全为人民、网络安全靠人民”的浓厚氛围，内江市互联网信息办公室决定开展《网络安全法》有奖知识问答。<br/>
                <b>奖项设置：</b>60分以上将获得1-10元随机红包。<span style="color: red;">(6月10日以后统一支付宝转账)</span><br/>
				<b>活动主办：</b>内江市互联网信息办公室<br/>
				<b>支持平台：</b>微信公众号“最内江”<br/>
				<b style="color: red">注意事项:<br>1、点击开始答题后不能退出，否则成绩无效不能再次答题！<br>2、每部手机只能答题一次！<br>3、共计25道题，预计完成需要20分钟。</b>
			</p>

		</div>
			<?php
      if ($arrs[0]['moneyleft']<11) {
      	    echo "<br/>
      	    <div style='color:red;text-align:center'><b>当前所有奖金已派送完毕！但您仍能继续答题！</b></div>
      	    </br>";
      }
	?>
		<button type="button" class="btn btn-primary btn-lg btn-block" style="width:200px;height:50px;color:#fff;margin:0 auto"><a style="color: #fff;font-size:18px;font-weight: bold;" href="http://wx.scnjnews.com/kaoshi/webchat/webchat.php">点击开始答题</a></button>
	</div>

	</div>

	<div style="position: fixed;bottom: 10px;color:#7a7a7a; text-align:center;width:100%">技术支持：内江日报融媒应用部</div>
	</body>

</html>
