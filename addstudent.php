<?php

// Add student template
include 'template/header.php';

include 'database/Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];

    $query = "INSERT INTO `students` (`id`, `name`, `email`, `time`) 
          VALUES (NULL, '{$user_name}', '{$user_email}', NOW());";

    $db = new Database();
    $insert = $db->query($query);
}


?>

<form class="max-w-sm mx-auto py-20" action="" method="post">

    <h2 class="text-2xl text-center font-semibold mb-4">Add Student</h2>
    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your Name</label>
        <input type="text" id="name" name="name"
               class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
               placeholder="Enter your name" required/>
    </div>
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your Email</label>
        <input type="email" id="email" name="email"
               class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
               required placeholder="Enter your mail"/>
    </div>

    <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
            <input id="terms" type="checkbox" value=""
                   class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300  dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                   required/>
        </div>
        <label for="terms" class="ms-2 text-sm font-medium text-gray-900">I agree with the <a
                    href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
    </div>
    <div>
        <button type="submit" name="addstudent" onclick="event.preventDefault();
        }"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Student
        </button>
        <a href="/students/" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-1">Back</a>
    </div>
</form>


<?php include 'template/footer.php' ?>
