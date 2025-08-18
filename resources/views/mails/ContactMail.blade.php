<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="./images/logo-fav.png" />
        <title>Customer Contact Form {{general()->title}}</title>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />

        <style>
            body {
                margin: 0;
                background: #fff;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                font-size: 14px;
                padding: 8px;
            }

            @media only screen and (max-width: 600px) {
            }
        </style>
    </head>
    <body>
        <div style="margin: 25px auto; width: 80%; min-width: 600px; overflow: auto; padding: 15px; background: #fff;">
            <center>
                <img src="{{URL::asset(general()->logo())}}" style="max-width: 200px;" />
                <h2 style="margin: 0;">CUSTOMER CONTACT DETAILS</h2>
            </center>
            <div style="background: #f1f1f1; padding: 10px; margin: 10px 0;">
                
                <p style="margin: 0; border-bottom: 1px solid #c6c6c6; padding: 5px 0;">CONTACT DETAILS</p>
                <p style="margin: 0;"><strong>Title:</strong> {{$datas['r']['title']}}</p>
                <p style="margin: 0;"><strong>Name:</strong> {{$datas['r']['name']}}</p>
                <p style="margin: 0;"><strong>Phone:</strong> {{$datas['r']['phone']}}</p>
                <p style="margin: 0;"><strong>Email:</strong> {{$datas['r']['email']}}</p>
                <p style="margin: 0;"><strong>Subject:</strong> {{$datas['r']['subject']}}</p>
                {!!$datas['r']['comment']!!}
            </div>
        </div>
    </body>
</html>
