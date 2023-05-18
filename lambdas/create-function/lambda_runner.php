<?php
   require '../../vendor/autoload.php';

   use Aws\S3\S3Client;
   use Aws\Lambda\LambdaClient;
   use Aws\Exception\AwsException;

   /*
   ** Creating a lambda function a writing it into a S3 bucket
   ** 
   **/ 
?>
<?php

    // Create an SDK class used to share configuration across clients.
    $credentials = [
        /*     'key' => 'YOUR_AWS_ACCESS_KEY',
            'secret' => 'YOUR_AWS_SECRET_ACCESS_KEY', */
            'region' => 'us-east-1', // Replace with your desired AWS region
            'version' => '2015-03-31'
        ];

    // Create an instance of the AWS Lambda client
    $lambda = new LambdaClient($credentials);

    function createFunction($lambda, $functionName, $role, $bucketName, $handler)
    {

        //This assumes the Lambda function is in an S3 bucket.
        //return $s3Client->waitUntil(function () use ($functionName, $bucketName) {
            return $lambda->createFunction([
                'Code' => [
                    'S3Bucket' => $bucketName,
                    'S3Key' => $functionName,
                ],
                'FunctionName' => $functionName,
                'Role' => $role['Arn'],
                'Runtime' => 'python3.9',
                'Handler' => "$handler.lambda_handler", // this parameter can be omitted because that's default
            ]);
        //});
    }

    $function_name = "demo-python-lambda";
    $role_arn['Arn'] = "arn:aws:iam::385401615023:role/service-role/lambda-config-demo-role-356f0gje";
    $bucket_name = "my-dummy-moron-bucket";
    $handler = "lambda";
    createFunction($lambda, $function_name ,$role_arn, $bucket_name, $handler);

?>