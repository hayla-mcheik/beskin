<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <div>
        <h2>Email Verification</h2>

        <p>
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
        </p>
        <a href="{{ route('verify.email', ['token' => $token]) }}">Verify your email</a>


    </div>
</body>
</html>
