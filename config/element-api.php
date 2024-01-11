<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
        'api/orderProduct' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'orderProduct'],
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'title' => $entry->title,
                        'image' => $entry->pizzaimage->one()->url,
                        'price' => $entry->price,
                        'ingredients' => $entry->summaryText,
                        'description' => $entry->summaryDescription,
                        'created_at' => $entry->createdAtDateTime->format('Y-m-d H:i:s'),
                    ];
                },
            ];
        }, 
    ]
];