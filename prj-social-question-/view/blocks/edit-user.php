
<?php
require("../../config/config.php");

$userModule = new User();

if (isset($_GET['username']) && $_GET['username'] != "") {
	$username = $_GET['username'];

	// $content = $_POST["content"];
	// $type = $_POST["type"];
	// $author = $_POST["author"];
	// // Kiểm tra xem các giá trị có rỗng hay không
	// if (empty($content) || empty($type) || empty($author)) {
	// 	set_message(display_error("Vui lòng điền đầy đủ thông tin!"));
	// 	header("location: ../../admin/question.php");
	// 	exit();
	// } else {
	// 	$update_question = $questionModule->updateQuestionById($id, $content, $type, $author);
	// 	if (!empty($update_question)) {
	// 		set_message(display_success("Cập nhật thành công!"));
	// 		header("location: ../../admin/question.php");
	// 		exit();
	// 	} else {
	// 		set_message(display_error("Lỗi cập nhật"));
	// 		header("location: ../../admin/question.php");
	// 		exit();
	// 	}
	// }

	$user = $userModule->getUserByUsername($username);
}

?>

<div class="container">
	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
		<form action="./update_user.php?username=<?php echo $user['username']; ?>" method="POST" enctype="multipart/form-data">
			<h3 class="text-center">Edit Personal Information</h3>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">First Name:</label>
						<input type="text" name="first_name" class="form-control" value="<?php echo $user['firstname'] ?>" required>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Last Name: </label>
						<input type="text" name="last_name" class="form-control" value="<?php echo $user['lastname'] ?>" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Avatar:</label>
						<img src="../../public/avatar/<?php echo $user['avatar'];?>" width="50px" height="50px" alt="" class="img-circle">
						<input type="file" name="img" class="form-control" value="<?php echo $user['avatar']; ?>">
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Mobile Number:</label>
						<input type="tel" name="phone" class="form-control" value="" required pattern=[0-9]{10}>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Date Of Birth:</label>
						<input type="date" name="birthday" class="form-control" value="" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Gender:</label>
						<select name="gender" class="form-control" value="" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Nationality:</label>
						<input type="text" name="nationality" class="form-control" value="" required>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="profile_details_text">Monthly Income:</label>
						<input type="text" name="monthly_income" class="form-control" value="" required>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit">
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Submit">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>