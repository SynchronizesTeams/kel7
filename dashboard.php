<?php
include("services/db.php");
session_start();
if (isset($_POST['input'])) {
  $subject = $_POST['subject'];
  $username = $_SESSION['username'];
  $files = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  move_uploaded_file($tmp_name, "images/" . $file);
  $sql = "INSERT INTO `tblist` (`id`, `subject`, `date`, `likes`, `username`) VALUES (NULL, '$subject', current_timestamp(), '0', '$username')";
  if ($db->query($sql)) {
    header("location: dashboard.php");
  }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="http://cdn.tailwindcss.com/"></script>
</head>

<body>
  <!-- component -->
  <div class="w-full flex flex-row flex-wrap">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .round {
        border-radius: 50%;
      }
    </style>


    <div class="w-full bg-indigo-100 h-screen flex flex-row flex-wrap justify-center ">

      <!-- Begin Navbar -->

      <div class="bg-white shadow-lg border-t-4 border-indigo-500 absolute bottom-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
        <div class="w-full text-right"><button class="p-2 fa fa-bars text-4xl text-gray-600"></button></div>
      </div>

      <div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-white shadow-lg">
        <div class="p-5 bg-white sticky top-0">
          <img class="border border-indigo-100 shadow-lg round" src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg">
          <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
            <?= $_SESSION['username'] ?>
          </div>
        </div>
        <div class="w-full h-screen antialiased flex flex-col hover:cursor-pointer">
          <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-comment text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Messages</a>
          <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href="setting.php"><i class="fa fa-cog text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Settings</a>
          <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 w-full text-xl text-left text-gray-600 font-semibold" href=""><i class="fa fa-arrow-left text-gray-600 text-2xl pr-1 pt-1 float-right"></i>Log out</a>
        </div>
      </div>

      <!-- End Navbar -->


      <div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">
        <div class="bg-white w-full shadow rounded-lg p-5">
          <form action="dashboard.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" value="kirim" id="password" placeholder="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            <textarea type="text" name="subject" class="bg-gray-200 w-full rounded-lg shadow border p-2" rows="5" placeholder="Speak your mind"></textarea>
            <div class="w-full flex flex-row flex-wrap mt-3">
              <div class="w-1/3">
              </div>
              <div class="w-2/3">
                <button type="submit" name="input" class="float-right bg-indigo-400 hover:bg-indigo-300 text-white p-2 rounded-lg">Submit</button>
              </div>
          </form>
        </div>
      </div>
      <?php
      $sqli = "SELECT * FROM tblist";
      $hasil = $db->query($sqli);
      $no = 1;
      $urut = $no++;
      while ($result = mysqli_fetch_array($hasil)) {
        $id = $result['id'];
        $subject = $result['subject'];
        $tgl = $result['date'];
        $username = $result['username'];
        $likes = $result['likes'];
      ?>
        <table>
          <td>
            <div class="mt-3 flex flex-col">
              <div class="bg-white p-1 border shadow flex flex-row flex-wrap">
                <div class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold"><?php echo $username ?></div>
              </div>
              <div class="bg-white">
                <img class="border rounded-t-lg shadow-lg " src="images/<?php echo $files ?>">
                <div class="bg-white border shadow p-5 text-xl text-gray-700 font-semibold">
                  <?php echo $subject ?>
                </div>
                <div class="bg-white p-1 border shadow flex flex-row flex-wrap">
                  <button type="checkbox" class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold">Like</button>
                  <p class="w-1/3 hover:bg-gray-200 text-center text-xl text-gray-700 font-semibold"><?php echo $likes  ?></p>
                </div>
              </div>
            </div>
    </div>
  </div>
  </div>
  </td>
  </table>
<?php } ?>
</div>
</body>

</html>