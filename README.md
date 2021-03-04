# php-xml-array-parser
Parse an array to XML in php.
The function transform an array to a XML file or SimpleXMLElement object.
Its handle with key, values, and attributes.
To use this function an array needs to follow this structure:

```
  $array = [
        [
            'key' => 'car',
            'fields' =>
                [
                    ['key' => 'wheel', 'value' => 1],
                    ['key' => 'wheel', 'value' => 2],
                    ['key' => 'wheel', 'value' => 3],
                    ['key' => 'tire', 'value' => 3],
                    ['key' => 'wire', 'fields' => [
                        ['key' => 'central', 'value' => 1],
                        ['key' => 'pack', 'attributes' =>
                            ['key' => 'HX', 'value' => 'Right'],
                            ['key' => 'HX', 'value' => 'Right'],
                            ['key' => 'HZ', 'value' => 'Left'],
                        ],
                    ]],
                ]
        ]
    ];
```
