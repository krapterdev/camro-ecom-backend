<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Hello {{ $email_verificationData['name'] }}</h2>
    <p>Please verify your email by clicking below:</p>
    <p>
<a href="{{ $email_verificationData['verification_link'] }}">Verify Email</a>
    </p>
</body>
</html>
