<?php

require '../../vendor/autoload.php';

/**
 * Getting each bucket metadata: Name and CreationDate
 */

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// Create an SDK class used to share configuration across clients.
$sdk = new Aws\Sdk([
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);
// Use an Aws\Sdk class to create the S3Client object.
$s3 = $sdk->createS3();
$result = $s3->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}



?>