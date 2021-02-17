<?php
    require __DIR__ . '/vendor/autoload.php';

    $client = new Google_Client();
    $client->setApplicationName('Test for API of googleSheets');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');

    $service = new Google_Service_Sheets($client);

    $spreadsheetId = "1kNDjAG_O7a8ksgk4wFggjqOBohckMo52IvUnoeZa6KQ";
    $range = 'data';

    $values = [
        [
            "This", "Is", "a", "New", "Row"
        ]
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => "RAW"
    ];

    $insert = [
        'insertDataOption' => "INSERT_ROWS"
    ];

    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params, $insert);
    printf("%d cells appended.", $result->getUpdates()->getUpdatedCells());
?>