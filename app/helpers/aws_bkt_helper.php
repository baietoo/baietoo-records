<?php
require_once(APP_ROOT . '/../vendor/autoload.php');
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars

function uploadToBucket($files){
    $bucket = S3_BUCKET?: die('No "S3_BUCKET" config var in found in env!');

    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'eu-central-1',
        'credentials' => [
            'key' => AWS_ACCESS_KEY_ID,
            'secret' => AWS_SECRET_ACCESS_KEY
        ]
    ]);
    $upload = $s3->upload($bucket, $files['song_filename']['name'], fopen($files['song_filename']['tmp_name'], 'rb'), 'public-read');
    // $upload->get('ObjectURL'); // test if upload sucessful
}

function getFromBucket($filename){
    $bucket = S3_BUCKET?: die('No "S3_BUCKET" config var in found in env!');

    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'eu-central-1',
        'credentials' => [
            'key' => AWS_ACCESS_KEY_ID,
            'secret' => AWS_SECRET_ACCESS_KEY
        ]
    ]);

    $cmd = $s3->getCommand('GetObject', [
        'Bucket' => $bucket,
        'Key' => $filename
    ]);
    
    $request = $s3->createPresignedRequest($cmd, '+20 minutes');
    $uri = $request->getUri();
    $file_link = $uri->getScheme() . '://' . $uri->getHost() . $uri->getPath();
    return $file_link;
}

function deleteFromBucket($filename){
    $bucket = S3_BUCKET?: die('No "S3_BUCKET" config var in found in env!');

    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'eu-central-1',
        'credentials' => [
            'key' => AWS_ACCESS_KEY_ID,
            'secret' => AWS_SECRET_ACCESS_KEY
        ]
    ]);

    $result = $s3->deleteObject(array(
        'Bucket' => $bucket,
        'Key' => $filename
    ));
    var_dump($result);
}
