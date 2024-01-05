<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Permission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php
        include '../backend/access.php';
        check_user_permission($allowed_permission_type, 'permission');
        checkUserPermission($allowed_permission_slug, 'permission_add');

    ?>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <form class="border p-4 rounded shadow" action="../backend/permission_backend/add_permission.php" method="POST">
                    <h2 class="text-center mb-4">Add Permission</h2>

                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="restrictedInput" name="name" required placeholder="(add, delete, edit, view)"><br>
                    <p id="error-message" style="color: red;"></p>

                    <label for="type" class="form-label">Type:</label>
                    <select id="type" class="form-control" name="type" required>
                        <option value="user">user</option>
                        <option value="role">role</option>
                        <option value="permission">permission</option>
                    </select><br>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#restrictedInput').on('input', function () {
                var inputValue = $(this).val().toLowerCase();
                var allowedWords = ['add', 'delete', 'view', 'edit'];
                var errorMessage = $('#error-message');

                if (!allowedWords.includes(inputValue)) {
                    $(this).addClass('form-control-error');
                    errorMessage.text('Please enter a valid word: add, delete, view, or edit.');
                } else {
                    $(this).removeClass('form-control-error');
                    errorMessage.text('');
                }
            });
        });
    </script>
</body>

</html>
