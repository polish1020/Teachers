	<h3>用户登录</h3>
	<form id="loginform" class="well" method="POST" action="./login/checkuser.php" target="fracheck">
		<input name="userNum" id="userNum" type="text" class="span2" placeholder="Email" /><br />
		<input name="userPwd" id="userPwd" type="password" class="span2" placeholder="Password" /><br />
		<label class="checkbox"> <input type="checkbox" /> Remember me </label>
		<button type="submit" class="btn btn-primary">登录</button>
		<button type="submit" class="btn">忘记密码</button>
	</form>	
	<iframe name="fracheck" style="width:0px;height:0px;display:none;"> </iframe>