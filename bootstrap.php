<?php
require __DIR__ . '/vendor/autoload.php';

$options = getopt('', array('key:', 'secret:', 'stack::'));

$awsKey = $options['key'];
$awsSecret = $options['secret'];
$stackId = @$options['stack'];

$opsworks = Aws\OpsWorks\OpsWorksClient::factory(
    array(
        'key' => $awsKey,
        'secret' => $awsSecret,
        'region' => 'us-east-1',
    )
);