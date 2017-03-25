<!DOCTYPE html>
<html>
    <head>
        <title>MonkMad.Pvt.Ltd.</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body style="margin: 0;padding: 0;width: 100%;display: table;font-weight: 100;height: 100%;">
        <div style="text-align: center;display: table-cell;vertical-align: middle;">
            <div style="width: 450px;margin: 0 auto;">
                
                <div style="text-align: center;border-bottom: 1px lightgrey solid;">
                    <h2><strong>Client Information</strong></h2>
                </div>
                <div style=" text-align: center;display: inline-block;border-bottom: 1px lightgrey solid;">
                    <p><b>Client Username:</b> {{$user_data['name']}}</p>
                    <p><b>Client Email:</b> {{$user_data['email']}}</p>
                    <p><b>Client Contact:</b> {{$user_data['mobile_number']}}</p>
                    <p><b>Client Location:</b> {{$user_data['location']}}</p>
                    <p><b>Client Requirement:</b> {{$user_data['requirement']}}</p>
            </div>
                <p>Thanks,</p>
                <p>MonkMad</p>
        </div>
        </div>
    </body>
</html>