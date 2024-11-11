<h1>Welcome to Our Platform, {{ $user->getShortName() }}!</h1>

<p>Thank you for joining us. Here are your login details:</p>

<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Password:</strong> {{ $password }}</p>

<p>You can log in at <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>

<p>To update your password, click the following link:</p>
<p><a href="{{ $resetPasswordLink }}">Update Your Password</a></p>

<p>Best regards,<br>Our Team</p>
