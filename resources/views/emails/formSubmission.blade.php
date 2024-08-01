<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .content {
            font-size: 16px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">New Form Submission</div>
        <div class="content">
            <p><strong>Name:</strong> {{ $formSubmission->name }}</p>
            <p><strong>Email:</strong> {{ $formSubmission->email }}</p>
            <p><strong>Message:</strong> {{ $formSubmission->message }}</p>
        </div>
        <div class="footer">
            This email was sent from your website's form submission.
        </div>
    </div>
</body>
</html>
