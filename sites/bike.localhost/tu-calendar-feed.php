<?php

$cur_date = strftime("%m/%d/%Y");
$end_date = strftime("%m/%d/%Y", strtotime("+60 days"));
$dept = '10';

$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$url = 'http://calendar.activedatax.com/temple/downloadevents.aspx?export=export&type=N&ihc=n&sDate='.$cur_date.'&eDate='.$end_date.'&fType=xml&dType=&depts='.$dept.'&xmlbinary=ref&sort=id';

$xml = file_get_contents($url, false, $context);

$xml = simplexml_load_string($xml);

echo $xml->asXML();