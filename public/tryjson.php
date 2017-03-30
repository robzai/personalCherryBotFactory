<?php

$json ='[{"id":"4a2522","model":"b","piece":3,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"3c4b63","model":"b","piece":3,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"1c9eab","model":"c","piece":3,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"3d8853","model":"r","piece":1,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"1aa9da","model":"a","piece":1,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"113b60","model":"a","piece":1,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"3f0ea2","model":"c","piece":3,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"29f93e","model":"a","piece":1,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"2660bd","model":"c","piece":3,"plant":"cherry","stamp":"2017-03-30 21:36:14."},{"id":"30775e","model":"r","piece":2,"plant":"cherry","stamp":"2017-03-30 21:36:14."}]';
$array1 = json_decode($json);

echo var_dump($array1);