<?php
include("services/db.php");
session_start();



if (isset($_POST['send'])) {
	$subject = $_POST['subject'];
	$sql = "INSERT INTO `tblist` (`id`, `subjek`, `tgl`) VALUES (NULL, '$subject', 'current_timestamp()')";
	if ($db->query($sql)) {
		header("location: about.php");
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<!-- component -->
	<div class="bg-gray-50 dark:bg-gray-900 h-screen">
		<nav class="w-full text-white bg-gray-800 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-primary-800">
			<h1 class="text-white text-2xl font-bold">Hello <?php echo $_SESSION["username"] ?> </h1>
		</nav>
		<div>
			<form class="flex justify-center mt-10" action="about.php" method="POST">
				<div class="bg-gray-50 p-8 rounded-lg">
					<h1 class="text-center mb-4">Write Todo List</h1>
					<div class="flex space-x-2 p-2 bg-white rounded-md">
						<input type="text" name="subject" placeholder="Write here..." class="w-full outline-none" />
						<button type="submit" name="send" class="bg-green-500 px-2 py-1 rounded-md text-white font-semibold">send</button>
					</div>
				</div>
			</form>
			<table>
				<div>
					<?php
					$sql = "SELECT * FROM tblist";
					$hasil = $db->query($sql);
					$no = 1;
					$urut = $no++;
					while ($result = mysqli_fetch_array($hasil)) {
						$id = $result['id'];
						$subject = $result['subjek'];
						$tgl = $result['tgl'];
						$_SESSION["subject"] = $subject;
					?>
						<tr>
							<div class="flex justify-center">
								<div class=" relative justify-center mt-6">
									<div class="absolute flex top-0 right-0 p-3 space-x-1">
										<span>
											<a href="update.php">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
												</svg>
											</a>
										</span>
										<span>
											<a href="delete.php">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
												</svg>
											</a>
										</span>
									</div>
									<span class="absolute -left-3 -top-3 bg-green-500 flex justify-center items-center rounded-full w-8 h-8 text-gray-50 font-bold">
										<?php echo $urut++ ?>
									</span>
									<p class="bg-white px-12 py-8 rounded-lg w-80 break-all">
										<?php echo $subject ?>
									</p>
								</div>
							</div>
				</div>
		</div>
	</div>
	</tr>
<?php } ?>
</table>
</body>

</html>