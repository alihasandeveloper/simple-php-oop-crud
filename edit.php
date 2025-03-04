<?php

//Edit Template

include 'template/header.php';

include "database/Database.php";

$db = new Database();

$id = $_GET['id'];

$message = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $query = "UPDATE `students` 
              SET `name` = '$user_name', `email` = '$user_email', `time` = NOW() 
              WHERE `students`.`id` = $id";
    $db->query($query);
    $message = true;
}

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `students` WHERE `id` = $id";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $vale = $result->fetch_assoc();
        $name = $vale['name'];
        $email = $vale['email'];
    }
}
?>

<form class="max-w-sm mx-auto py-20" action="" method="post">

    <h2 class="text-2xl text-center font-semibold mb-4">Edit Student</h2>
    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your Name</label>
        <input type="text" id="name" name="name"
               class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
               placeholder="Enter your name" value="<?php echo $name ?>"/>
    </div>
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your Email</label>
        <input type="email" id="email" name="email"
               class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
               required placeholder="Enter your mail" value="<?php echo $email ?>"/>
    </div>
    <div>
        <button type="submit" name="addstudent"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Update
        </button>
        <a href="/students/"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-1">Back</a>
    </div>

    <?php if ($message) : ?>
        <div id="toast-success" class=" flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 absolute top-22 right-4" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Updated successfully.</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>

    <?php endif; ?>
</form>

<?php include 'template/footer.php'; ?>
