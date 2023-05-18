<?php

require '../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// Create an SDK class used to share configuration across clients.
$sdk = new Aws\Sdk([
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);
// Use an Aws\Sdk class to create the S3Client object.
$s3Client = $sdk->createS3();
//Listing all S3 Bucket
$CompleteSynchronously = $s3Client->listBucketsAsync();

// Block until the result is ready.
$CompleteSynchronously = $CompleteSynchronously->wait();

echo $CompleteSynchronously;


?>