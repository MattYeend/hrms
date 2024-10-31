<h1>Welcome to Our Platform, {{ $user->name }}!</h1>

<p>Thank you for joining us. Here are your login details:</p>

<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Password:</strong> {{ $password }}</p>

<p>You can log in at <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>

<p>We recommend that you change your password after your first login.</p>

<p>Best regards,<br>Our Team</p>
