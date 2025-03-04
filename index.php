<?php
include("database/Database.php");

$db = new Database();

$query = "SELECT * FROM students";

$result = $db->query($query);
?>
<?php include 'template/header.php'; ?>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    time
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $row['name'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $row['id'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row['email'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row['time'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="/students/edit.php?id=<?php echo $row['id']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-1">Edit</a>
                            <a href="/students/delete.php?id=<?php echo $row['id']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                        </td>
                    </tr>

                <?php endwhile; ?>

            <?php endif; ?>
            </tbody>
        </table>
    </div>


<?php include 'template/footer.php'; ?>