<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <p>Hello,</p>
                        <p>You are receiving this email because we received a password reset request for your account.</p>
                        <p>Please click the button below to reset your password:</p>
                        <a href="{{$resetUrl}}" class="btn btn-primary">Reset Password</a>
                        <p>If you did not request a password reset, no further action is required.</p>
                        <p>Regards,</p>
                        <p>Wonkids Club</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>