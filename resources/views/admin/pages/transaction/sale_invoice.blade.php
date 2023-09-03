<!DOCTYPE html>
<html>

    <head>
        <title>Sale Invoice</title>
        <style>
            /* Add your custom CSS styles for the PDF here */
            body {
                font-family: Arial, sans-serif;
                color: #333;
                line-height: 1.6;
                margin: 0;
            }

            .invoice-container {
                width: 100%;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #f9f9f9;
            }

            .invoice-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .invoice-header h1 {
                margin: 0;
                font-size: 28px;
                color: #333;
            }

            .invoice-company-info {
                text-align: center;
                margin-bottom: 30px;
            }

            .invoice-company-info h2 {
                margin: 0;
                font-size: 24px;
                color: #333;
            }

            .invoice-details {
                margin-bottom: 30px;
                display: flex;
                justify-content: space-between;
            }

            .invoice-details p {
                margin: 0;
                font-size: 16px;
            }

            .invoice-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
            }

            .invoice-table th,
            .invoice-table td {
                padding: 10px;
                border: 1px solid #ccc;
                font-size: 14px;
            }

            .invoice-table th {
                background-color: #f2f2f2;
                font-weight: bold;
                text-align: left;
            }

            .invoice-total {
                text-align: right;
                font-size: 18px;
                font-weight: bold;
            }

            .invoice-footer {
                text-align: center;
                font-size: 16px;
            }

            .thank-you {
                margin-top: 30px;
            }
        </style>
    </head>

    <body>
        <div class="invoice-container">
            <div class="invoice-header">
                <h1>Invoice</h1>
            </div>
            <div class="invoice-company-info">
                <h2>{{ $content->website_name }}</h2>
                <p>{{ $content->website_address }}</p>
                <p>Phone: {{ $content->website_phone }}</p>
                <p>Email: {{ $content->website_email }}</p>
            </div>
            <div class="invoice-details">
                <div>
                    <p><strong>Invoice ID:</strong> {{ $sale['invoice'] }}</p>
                    <p><strong>Date:</strong> {{ $sale['created_at'] }}</p>
                </div>
                <div>
                    <p><strong>Seller:</strong> {{ $sale['seller'] }}</p>
                    <p><strong>Invoice Number:</strong> {{ $sale['invoice'] }}</p>
                </div>
            </div>
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Item Title</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $sale['type'] }}</td>
                        <td>{{ $sale['item_title'] }}</td>
                        <td>${{ $sale['amount'] }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="invoice-total">
                <p>Total: ${{ $sale['amount'] }}</p>
            </div>
            <div class="invoice-footer">
                <p class="thank-you">Thank you for your purchase!</p>
                <p>For any inquiries, please contact us at the provided contact information above.</p>
            </div>
        </div>
    </body>

</html>