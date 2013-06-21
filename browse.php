#!/usr/bin/env php
<?php
require __DIR__ . '/bootstrap.php';

if (null === $stackId) {
    $stacks = $opsworks->describeStacks()->getAll();

    foreach ($stacks['Stacks'] as $stack) {
        print_line($stack['Name'], $stack['StackId'], 'Stack');
    }
}

if (null !== $stackId) {

    $params = array('StackId' => $stackId);

    $instances = $opsworks->describeInstances($params)->getAll();
    foreach ($instances['Instances'] as $instance) {
        print_line($instance['Hostname'], $instance['InstanceId'], 'Instance');
    }

    echo "\n\n";

    $layers = $opsworks->describeLayers($params)->getAll();
    foreach ($layers['Layers'] as $layer) {
        print_line($layer['Name'], $layer['LayerId'], 'Layer');
    }
}

function print_line($name, $id, $description)
{
    echo sprintf("\t%s: %s\n\tID: %s\n", $description, $name, $id);
}