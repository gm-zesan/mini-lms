<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} Enrollment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #10ac9e;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            line-height: 1.6;
        }

        .content p {
            font-size: 14px;
            margin: 5px 0;
        }

        .content .course-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .content .course-info h3 {
            margin-bottom: 16px;
            font-size: 20px;
            color: #333;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #ddd;
        }

        .footer a {
            color: #f9af22;
            text-decoration: none;
        }

        .button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td class="header">
                <h1>Welcome to {{ $course->title }}!</h1>
            </td>
        </tr>
        <tr>
            <td class="content">
                <p>Dear {{ $student->name }},</p>
                <p>Thank you for enrolling in the course titled <strong>{{ $course->title }}</strong>! We're excited to have you on this course.</p>

                <p><strong>Course Description:</strong></p>
                <p>{!! $course->description !!}</p>

                <div class="course-info">
                    <h3>Course Information</h3>
                    <p><strong>Course Name:</strong> {{ $course->title }}</p>
                    <p><strong>Google Classroom Code:</strong> {{ $course->google_classroom_code }}</p>
                </div>
            </td>
        </tr>
        <tr>
            <td class="footer">
                <p>Thank you for choosing our platform! If you have any questions, feel free to <a
                        href="mailto:support@example.com">contact us</a>.</p>
                <p>&copy; {{ date('Y') }} Our Platform. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>

</html>
