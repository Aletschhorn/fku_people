<?php
return [
    'fku_people:birthday' => [
        'class' => \FKU\FkuPeople\Command\BirthdayCommand::class,
    ],
    'fku_people:notification' => [
        'class' => \FKU\FkuPeople\Command\NotificationCommand::class,
    ],
    'fku_people:sync' => [
        'class' => \FKU\FkuPeople\Command\SyncCommand::class,
    ],
];
?>