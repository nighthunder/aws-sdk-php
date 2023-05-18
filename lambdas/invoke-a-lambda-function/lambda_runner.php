<?php

require '../../vendor/autoload.php'; // Make sure to install the AWS SDK for PHP using Composer

/**
 * 
 * Execute a specified lambda function
 * Here the lambda function is a previous nodejs lambda created by myself to retrieve data from a RSS Feed.
 */

use Aws\Lambda\LambdaClient;
use Aws\Exception\AwsException;

// Configure the AWS credentials and region
// OBS: I didn't put here the key and secret because my AWS CLI is configured to used the default profile
$credentials = [
/*     'key' => 'YOUR_AWS_ACCESS_KEY',
    'secret' => 'YOUR_AWS_SECRET_ACCESS_KEY', */
    'region' => 'us-east-1', // Replace with your desired AWS region
    'version' => '2015-03-31'
];

// Create an instance of the AWS Lambda client
$lambda = new LambdaClient($credentials);

// Define the Lambda function parameters
$functionName = 'retrieve-from-rss-feed-v2';
$payload = json_encode(['name' => 'John']);

try {
    // Invoke the Lambda function
    $result = $lambda->invoke([
        'FunctionName' => $functionName,
        'Payload' => $payload
    ]);

    // Get the response from the Lambda function
    $response = $result['Payload']->getContents();

    // Process the response
    echo $response;
} catch (AwsException $e) {
    // Handle any errors that occur during the invocation
    echo 'Error: ' . $e->getMessage();
}

?>
