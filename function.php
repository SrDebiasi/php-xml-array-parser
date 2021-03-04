<?php

/**
 * Main function to call toXml
 */
function main()
{
    $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><data
        xmlns:ns2="http://www.w3.org/2000/09/xmldsig#"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        "></data>');

    $array = [];
    toXml($xml, $array);
    $filename = 'path/filename.xml';
    $xml->asXML($filename);
}

/**
 * Parse an array to SimpleXMLElement
 * More info at readme
 * @param \SimpleXMLElement $object
 * @param array $data
 */
function toXml(\SimpleXMLElement $node, array $data)
{
    foreach ($data as $key => $value) {
        $key = $value['key'];
        if (isset($value['value'])) {
            $newNode = $node->addChild($key, $value['value']);
            if (isset($value['attributes'])) {
                foreach ($value['attributes'] as $keyAttr => $valueAttr) {
                    $newNode->addAttribute($keyAttr, $valueAttr);
                }
            }
        } else {
            $newNode = $node->addChild($key);
            if (isset($value['attributes'])) {
                foreach ($value['attributes'] as $keyAttr => $valueAttr) {
                    $newNode->addAttribute($keyAttr, $valueAttr);
                }
            }
        }
        if (isset($value['fields'])) {
            foreach ($value['fields'] as $keyField => $valueField) {
                toXml($newNode, [$keyField => $valueField]);
            }
        }
    }
}