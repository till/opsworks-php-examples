#!/usr/bin/env php
<?php
require __DIR__ . '/bootstrap.php';

// this is an example how you assign one instance
// to multiple layers

$optionUpdate = getopt('', array('instance:', 'layers:'));

$instanceId = $optionUpdate['instance'];

$layers = $optionUpdate['layers'];
if (null === $layers) {
    echo "Need layers!";
    exit(1);
}

$layers = explode(',', $layers);
if (count($layers) == 1) {
    $layers = (string) $layers[0];
}

$status = $opsworks->updateInstance(
    array(
        'InstanceId' => $instanceId,
        'LayerIds' => $layers,
    )
);