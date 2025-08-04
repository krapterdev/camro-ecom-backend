<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Hello <?php echo e($email_verificationData['name']); ?></h2>
    <p>Please verify your email by clicking below:</p>
    <p>
<a href="<?php echo e($email_verificationData['verification_link']); ?>">Verify Email</a>
    </p>
</body>
</html>
<?php /**PATH C:\xampp-8.2.1\htdocs\react\camro_ecom\camro_backend\resources\views/emails/user/email_verification.blade.php ENDPATH**/ ?>