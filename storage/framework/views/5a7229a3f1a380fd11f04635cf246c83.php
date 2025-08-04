<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f8f9fa;">

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">New Contact Message Received</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0">
                    <tbody>
                        <tr>
                            <th scope="row">Name</th>
                            <td><?php echo e($contactData['name']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?php echo e($contactData['email']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td><?php echo e($contactData['phone']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Message</th>
                            <td><?php echo e($contactData['message']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted text-center">
                Thank you!
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp-8.2.1\htdocs\react\camro_ecom\camro_backend\resources\views/emails/contact.blade.php ENDPATH**/ ?>