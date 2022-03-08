<?php
return [
    'frontend' => [
        'FkuPeople/notification-change' => [
            'target' => \FKU\FkuPeople\Middleware\NotificationChange::class,
            'after' => [
                'typo3/cms-frontend/prepare-tsfe-rendering'
            ]
        ],
    ],
];
?>