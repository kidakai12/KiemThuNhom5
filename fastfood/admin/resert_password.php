	<?php
		session_start();
		if(isset($_SESSION['usr']['uid']))
		{
			include("includes/header.php");
		}
		else
		{
			 header('Location:login.php');
		}
		require("../includes/connect_db.php");
		include("../includes/check_errors.php");
		if(isset($_GET['id']) && $_GET['id']!=null)
		{
			$url=$_GET['id'];
			$query_item="SELECT taikhoan,email FROM khachhang WHERE makh=".$url;
			$result_item=mysqli_query($dbc,$query_item);check_errors($result_item,$query_item);
			if(mysqli_num_rows($result_item)<1)
			{
				header('location:quanlyuser.php');
			}
			list($taikhoan,$email)=mysqli_fetch_array($result_item,MYSQLI_NUM);
		}else{
			header('location:quanlyuser.php');
		}
	?>
		<div id="mid">
			<div class="row" style="width: 100%;">
				<div class="col-sm-2">
					<?php
						if($_SESSION['usr']['vaitro']==2)
						{
							include('includes/menu_left1.php');
						}
						else if($_SESSION['usr']['vaitro']==1){
							include('includes/menu_left.php');
						}
						else if($_SESSION['usr']['vaitro']==3)
						{
							 include('includes/menu_left3.php');
						}
					?>
				</div>
				<?php
					if(isset($_POST['submit']))
					{
					    $errors=array();
					    if(empty($_POST['matkhau']))
					    {
					        $errors[]='matkhau';
					    }else
					    {
					        $matkhau=md5($_POST['matkhau']);

					    }
					    if($_POST['matkhau']!=$_POST['xnmk'])
					    {
					    	$errors[]='matkhau';
					    }
					    if(empty($errors))
					    {
					        $query_tk="UPDATE khachhang SET matkhau='".$matkhau."' WHERE makh=".$_GET['id'];
							$result_tk=mysqli_query($dbc,$query_tk);check_errors($result_tk,$query_tk);
							$errors[]='success';
					    }else{
					    	$errors[]='error';
					    }
					}
				?>
				<div class="col-sm-10 contain_right">
					<div style="background-color:white;margin-right: -29px;margin-left: -15px;color: black;padding: 40px;">
						<h3>Resert password</h3>
						<form method="POST" name="resertpassword">
						    <div class="form-group">
						      <label for="taikhoan">T??i kho???n:</label>
						      <input type="text" class="form-control" id="taikhoan" name="taikhoan" value="<?php echo $taikhoan;?>"disabled='disabled'>
						    </div>
						    <div class="form-group">
						      <label for="email">Email:</label>
						      <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>"disabled='disabled'>
						    </div>
						    <div class="form-group">
						      <label for="matkhau">M???t kh???u m???i:</label>
						      <input type="password" class="form-control" id="matkhau" placeholder="M???t kh???u m???i" name="matkhau">
						    </div>
						    <div class="form-group">
						      <label for="xnmk">X??c nh???n m???t kh???u m???i:</label>
						      <input type="password" class="form-control" id="xnmk" placeholder="X??c nh???n m???t kh???u" name="xnmk">
						    </div>
						    <div>
						    	<?php
						            if(isset($errors)&&in_array('error',$errors))
									{
									    echo "<b style='color:red;'>Vui l??ng nh???p ????? th??ng tin!!!</b>";
									}
									else if(isset($errors)&&in_array('success',$errors)){
										echo "<b style='color:green;'>???? thay ?????i m???t kh???u th??nh c??ng</b>";
									}
						        ?>
						    </div>
						    <button type="button" name="button" class="btn btn-primary" onclick="back();">Quay v???</button>
						    <button type="submit" name="submit" class="btn btn-primary">Resert m???t kh???u</button>
						  </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function back()
	{
		window.location="quanlyuser.php";
	}
</script>
</html>