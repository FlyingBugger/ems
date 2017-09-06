<?php
/*
 * Created on 2016-5-19
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class action extends app
{
	public function display()
	{
		$action = $this->ev->url(3);
		if(!method_exists($this,$action))
		$action = "index";
		$this->$action();
		exit;
	}
	public function webchat(){
		$appid='wx6f1fa092a4f5e263';
		$appsecret='51eb6b33ee16bfa2e213c037f9d4c4f8';
		$code= $_SESSION["code"];
		 function https_request($url,$data="")//,
		 {
			 $ch=curl_init();
			 curl_setopt($ch, CURLOPT_URL, $url);//请求地址
			 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//文件流
			 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//关闭ssl验证

			 if ($data) {
				 curl_setopt($ch, CURLOPT_POST, 1);
				 curl_setopt($ch,CURLOPT_HEADER,0);

				 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//
			 }

			 $request=curl_exec($ch);//真行


			 $tempArr=json_decode($request,TRRUE);



			 if (is_array($tempArr)) {
				 return $tempArr;
			 }
			 else
			 {
				 return $request;
				 echo 2;
			 }

			 curl_close($ch);

		 }
			$ass="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
			$op="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
			$ops=https_request($op);
			$openid=$ops['openid'];
			$_SESSION['ifscore']=$openid;
		$acce=https_request($ass);
		$access_token=$acce["access_token"];//获取到token
		$sc="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid";
		//$sc="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN ";
		 $userinfo=https_request($sc);
		 if ($userinfo ["subscribe"]==0){
			echo "<p>对不起，请先关注本公众号！</p>";
			header('location:http://wx.scnjnews.com/qr.html');
			return false;
		 }
		$nickname=$userinfo['nickname'];
		$logintime=date('Y-m-d H-i-s',time());

		 //判断用户是否登陆过
			$dh=DH;
			$db=DB;
			$du=DU;
			$dp=DP;
			$pre=DTH;
			$mysql=new mysqli($dh,$du,$dp,$db);
			//$mysql=new mysqli('localhost','root','root','kaoshi');
			$mysql->query("set character set 'utf8'");//读库
			$mysql->query("set names 'utf8'");//写库
			$mysql->query("set names 'utf8'");
			$table=$pre.'weixinuser';
			$sel="SELECT * FROM $table WHERE openid='$openid'";
			$re=$mysql->query($sel);
			$arrs=array();
			while($arr=$re->fetch_array(MYSQLI_ASSOC))
			{
				$arrs[]=$arr;
			}

			if (empty($arrs)){
			$insert="INSERT INTO `$table` (`name`, `logintime`, `openid`) VALUES ('$nickname','$logintime','$openid')";
			$mysql->query($insert);
			}
			else{
				echo "<strong style='width:100%;display:block;margin:30% auto;color: red; text-align: center;font-size: 40px;'>对不起，每个用户只能参加一次！</strong>";
				exit;
			}
			$user['userid']=18;
			$user['userpassword']=123123;
			$user['usergroupid']=8;
			$user['username']=$userinfo['nickname'];
			$_SESSION['ifnickname']=$userinfo['nickname'];
		   $no=$this->session->setSessionUser(array('sessionuserid'=>$user['userid'],'sessionpassword'=>$user['userpassword'],'sessionip'=>$this->ev->getClientIp(),'sessiongroupid'=>$user['usergroupid'],'sessionlogintime'=>TIME,'sessionusername'=>$user['username']));
			$this->_user = $this->session->getSessionUser();
header("Location:index.php?exam-phone-exampaper-selectquestions&examid=7");
}


	private function index()
	{


		//$a=$this->webchat();
		//var_dump($a);
		$appid = 'user';
		$app = $this->G->make('apps','core')->getApp($appid);
	//	$test=$userinfo['openid'];
       // $this->tpl->assign('test',$test);
		$this->tpl->assign('app',$app);

		if($this->ev->get('userlogin'))//检验是否是登录
		{
			$tmp = $this->session->getSessionValue();
			if(TIME - $tmp['sessionlasttime'] < 1)
			{
				$message = array(
					'statusCode' => 300,
					"message" => "操作失败"
				);
				exit(json_encode($message));
			}
			$args = $this->ev->get('args');
			$user = $this->user->getUserByUserName($args['username']);
			if($user['userid'])
			{
				if($user['userpassword'] == md5($args['userpassword']))
				{
					if($app['appsetting']['loginmodel'] == 1)
					$this->session->offOnlineUser($user['userid']);
					//
					$this->session->setSessionUser(array('sessionuserid'=>$user['userid'],'sessionpassword'=>$user['userpassword'],'sessionip'=>$this->ev->getClientIp(),'sessiongroupid'=>$user['usergroupid'],'sessionlogintime'=>TIME,'sessionusername'=>$user['username']));
					//获取到的用户信息写到session中
				var_dump($_SESSION);
				return false;
						$message = array(
						'statusCode' => 200,
						"message" => "操作成功",
					    "callbackType" => 'forward',
					    "forwardUrl" => "index.php?exam-phone"
					);
					if($this->ev->get('userhash'))
					exit(json_encode($message));
					else
					exit(header("location:{$message['forwardUrl']}"));
				}
				else
				{
					$message = array(
						'statusCode' => 300,
						'errorinput' => 'args[username]',
						"message" => "操作失败"
					);
					exit(json_encode($message));
				}
			}
			else
			{
				$message = array(
					'statusCode' => 300,
					'errorinput' => 'args[username]',
					"message" => "操作失败"
				);
				exit(json_encode($message));
			}
		}
		else
		{
			$this->tpl->display('login');
		}
	}
}


?>
