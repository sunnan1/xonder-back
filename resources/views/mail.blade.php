<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <center>
        <h1>Xonder Application Details</h1>    
        <table>
            <tbody>
                <tr>
                    <td><label for="">Account Type : </label></td>
                    <td><b>{{ $accountType }}</b></td>
                </tr>
                <tr>
                    <td><label for="">First Name : </label></td>
                    <td><b>{{ $firstName }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Last Name : </label></td>
                    <td><b>{{ $lastName }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Email : </label></td>
                    <td><b>{{ $email }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Business Name : </label></td>
                    <td><b>{{ $businessName }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Trading Name : </label></td>
                    <td><b>{{ $tradingName }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Trading Address : </label></td>
                    <td><b>{{ $tradingAddress }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Business Description : </label></td>
                    <td><b>{{ $businessDescription }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Web Address : </label></td>
                    <td><b>{{ $webAddress }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Expected annual turnover (£) : </label></td>
                    <td><b>{{ $expectedTurnOver }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Average single payment incoming (£) : </label></td>
                    <td><b>{{ $singlePaymentIncome }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Average single payment outgoing (£) : </label></td>
                    <td><b>{{ $singlePaymentOutgoing }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Typical large payment you would receive into account (£) : </label></td>
                    <td><b>{{ $largePaymentReceiveAccount }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Typical large payment you would transfer out the account (£) : </label></td>
                    <td><b>{{ $largePaymentTransferAccount }}</b></td>
                </tr>
                <tr>
                    <td><label for="">Average payment volume per week (number of payments in total in/out the account) : </label></td>
                    <td><b>{{ $averageAmountWeek }}</b></td>
                </tr>
            </tbody>
        </table>
</center>
</body>
</html>