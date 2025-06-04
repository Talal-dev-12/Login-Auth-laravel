<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>One-Time Password (OTP)</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div
        style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333333;">🔐 Email Verification - One-Time Password (OTP)</h2>

        <p>Dear User,</p>

        <p>We received a request to verify your email address. Please use the following One-Time Password (OTP) to
            complete the verification process:</p>

        <p style="font-size: 24px; font-weight: bold; color: #2d89ef; text-align: center;">{{ $otp }}</p>

        <p>This OTP is valid for the next <strong>5 minutes</strong>. Please do not share it with anyone.</p>

        <p>If you did not request this, please ignore this email or contact our support team immediately.</p>

        <p>Best Regards,<br>
            <strong>YourApp Team</strong>
        </p>

        <hr>
        <p style="font-size: 12px; color: #999999;">This is an automated message. Please do not reply to this email.</p>
    </div>
</body>

</html>