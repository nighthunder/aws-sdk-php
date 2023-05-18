<?php
   require '/path/to/vendor/autoload.php';

   /*
   ** 
   ** 
   **/
?>
<?php

$sdk = new Aws\Sdk([
    'region'   => 'us-west-2',
    'version'  => 'latest',
    'DynamoDb' => [
        'region' => 'eu-central-1'
    ]
]);

// Creating an Amazon DynamoDb client will use the "eu-central-1" AWS Region
$client = $sdk->createDynamoDb();

?>