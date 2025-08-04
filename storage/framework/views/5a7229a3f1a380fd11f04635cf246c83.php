<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 4px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
        <tr>
            <td style="background-color: #007bff; padding: 15px; color: #fff; font-size: 18px; font-weight: bold; border-bottom: 1px solid #dee2e6; text-align: center; border-top-left-radius: 4px; border-top-right-radius: 4px;">
                New Contact Message Received
            </td>
        </tr>

        <tr>
            <td style="padding: 20px;">
                <table width="100%" cellpadding="5" cellspacing="0" border="0" style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="font-weight: bold; background-color: #f8f9fa; border: 1px solid #dee2e6;">Name</td>
                        <td style="border: 1px solid #dee2e6;"><?php echo e($contactData['name']); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; background-color: #f8f9fa; border: 1px solid #dee2e6;">Email</td>
                        <td style="border: 1px solid #dee2e6;"><?php echo e($contactData['email']); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; background-color: #f8f9fa; border: 1px solid #dee2e6;">Phone</td>
                        <td style="border: 1px solid #dee2e6;"><?php echo e($contactData['phone']); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; background-color: #f8f9fa; border: 1px solid #dee2e6;">Message</td>
                        <td style="border: 1px solid #dee2e6;"><?php echo e($contactData['message']); ?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td align="center" style="padding:15px; background-color:#000000ff; font-size:12px; color:#777;">
                &copy; <?php echo e(date('Y')); ?> Camro Ecom. All rights reserved.
            </td>
        </tr>
    </table>

</body>

</html><?php /**PATH C:\xampp-8.2.1\htdocs\react\camro_ecom\camro_backend\resources\views/emails/contact.blade.php ENDPATH**/ ?>