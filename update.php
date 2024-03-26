<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="bg-gray-50 dark:bg-gray-900 h-screen">
		<nav class="w-full text-white bg-gray-800 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-primary-800">
			<h1 class="text-white text-2xl font-bold">Hello </h1>
		</nav>
		<div>
			<form class="flex justify-center mt-10" action="about.php" method="POST">
				<div class="bg-gray-50 p-8 rounded-lg">
					<h1 class="text-center mb-4">Update</h1>
					<div class="flex space-x-2 p-2 bg-white rounded-md">
						<input type="text" name="subject" placeholder="update" class="w-full outline-none" />
						<button type="submit" name="send" class="bg-green-500 px-2 py-1 rounded-md text-white font-semibold">send</button>
					</div>
				</div>
</body>

</html>