			<!--<header class="container-fluid" style="background-color:#337AB7;">
			<h5 class="text-center">
			
				<em style="font-size:2rem;" class="pull-left glyphicon glyphicon-chevron-left" onclick="javascript:$.goPrePage();"></em>
				模拟考试
				<em style="font-size:2rem;" class="pull-right glyphicon glyphicon-home" onclick="javascript:$.goPage($('#page1'));"></em>
			</h5>
		</header>-->
		<div class="container-fluid">
			<div class="row-fluid">
				<div style="clear:both;overflow:hidden;background:#FFFFFF;margin-top:0.5rem;padding:0.5rem;">
					<!--<legend class="text-center"><h3>{x2;$sessionvars['examsession']}</h3></legend>-->
					<div class="col-xs-12">

	            		<div class="boardscore">
	            			<h1 class="text-center text-danger"><span id="scores">{x2;$sessionvars['examsessionscore']} 分<span></h1>
	            		</div>
	            	</div>
	            	<div class="col-xs-12">
	            		<div><b class="text-info">考试详情：</b></div>
	          			<p>总分：<b class="text-warning" >{x2;$sessionvars['examsessionsetting']['examsetting']['score']}</b>分 合格分数线：<b class="text-warning">{x2;$sessionvars['examsessionsetting']['examsetting']['passscore']}</b>分 答卷耗时：<b class="text-warning">{x2;if:$sessionvars['examsessiontime'] >= 60}{x2;if:$sessionvars['examsessiontime']%60}{x2;eval: echo intval($sessionvars['examsessiontime']/60)+1}{x2;else}{x2;eval: echo intval($sessionvars['examsessiontime']/60)}{x2;endif}分钟{x2;else}{x2;$sessionvars['examsessiontime']}秒{x2;endif}</b></p>
	              		<table class="table table-hover table-bordered">
	                      <tr class="success">
	                        <th>题型</th>
	                        <th>总题数</th>
	                        <th>答对题数</th>
	                        <th>总分</th>
	                        <th>得分</th>
	                      </tr>
	                      {x2;tree:$number,num,nid}
	                      {x2;if:v:num}
	                      <tr>
	                        <td>{x2;$questype[v:key]['questype']}</td>
	                        <td>{x2;v:num}</td>
	                        <td>{x2;$right[v:key]}</td>
	                        <td>{x2;eval: echo number_format(v:num*$sessionvars['examsessionsetting']['examsetting']['questype'][v:key]['score'],1)}</td>
	                        <td>{x2;eval: echo number_format($score[v:key],1)}</td>
	                      </tr>
	                      {x2;endif}
	                      {x2;endtree}
	                      <tr>
	                        <td colspan="5" align="left">本次考试共<b class="text-warning">{x2;$allnumber}</b>道题，总分<b class="text-warning">{x2;$sessionvars['examsessionsetting']['examsetting']['score']}</b>分，您做对<b class="text-warning">{x2;$allright}</b>道题，得到<b class="text-warning">{x2;$sessionvars['examsessionscore']}</b>分</td>
	                      </tr>
	                   </table>
	                   {x2;if:$data['currentbasic']['basicexam']['model'] != 2}
	                   <div class="text-center">
						   <!--<a data-target="views" data-page="views" href="index.php?exam-phone-history-view&ehid={x2;$ehid}" class="btn btn-primary ajax">查看答案和解析</a>&nbsp;&nbsp;&nbsp;&nbsp;
	                   		<a data-target="history" data-page="history" href="index.php?exam-phone-history&ehtype=1" class="btn btn-info ajax">进入我的考试记录</a>-->
	                   	</div>
	            	   {x2;endif}
	            	</div>
	            </div>
			</div>
		</div>

		<div class="container-fluid" style="display: none"  class="col-ms-10" id="nomoney">谢谢参与~但你不够辛运喔~红包已经被瓜分完了!</div>
		<!--表单提交-->

		<div class="container-fluid" style="display: none" id="bingo">
			<div style="margin: 0 auto; font-size:24px;text-align:center;font-weight:blod;color: red;">恭喜抽中红包！<span id="howmuch" style="font-size: 25px;height: 50px;width: 50px;"></span></div>
			<div style="margin: 0 auto; font-size:24px;font-weight:blod;color: red;">请在填写信息，6月10日后统一支付宝转账。</div>
			<form action="index.php?exam-phone-exampaper-scoress" method="post">

				<div class="form-group">
					<label for="exampleInputEmail1">姓名：</label>
					<input type="text" name="name" class="form-control" required id="exampleInputEmail1" placeholder="姓名">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">联系方式：</label>
					<input type="phonenumber" name="phonenumber" required class="form-control" max="11"  id="exampleInputPassword1" placeholder="联系方式">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">支付宝转账账号:</label>
					<input type="text" name="payway" class="form-control" id="exampleInputEmail1" placeholder="支付宝账号">
				</div>
				<div class="form-group" style="display: none">
                    <input type="text" name="moneyleft" class="form-control" id="moneyleft" value="{x2;$a}" title="剩余金额">
					<input type="text" name="money" class="form-control"   id="money" title="抽中的金额">
					<input type="text" name="score" class="form-control"   id="cores" title="得分">
				</div>

				<button type="submit" class="btn btn-default">提交</button>
			</form>
		</div>
		<script>
			$(function () {

//1-10
            var scores=document.getElementById('scores').innerHTML;
            var bingo=document.getElementById('bingo');
            console.log(scores);
            sc=parseInt(scores);
            //获取到剩余金额
			var totals=$('#moneyleft').val();

            if (sc>=60){


                bingo.style.display='block';
                //随机红包

              var r=parseInt(Math.random()*11);
             
               if (r==0){
                   r=1;
               }
              
               if (r>totals){
                   bingo.style.display='none';
                   var nomoney=document.getElementById('nomoney');
                   nomoney.style.display="block";
                   return false;
               }
               else{

                   var who=document.getElementById('money');
                   who.value=r;
                   var cores=document.getElementById('cores');
                   cores.value=sc;//得分
                   $('#howmuch').html(r+'元');
               }

            }
            else
                {
                    console.log(2)
                    bingo.style.display='none';
                }
            })

		</script>