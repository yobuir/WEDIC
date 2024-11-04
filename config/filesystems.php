<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'BlogThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/blog/thumbnails'),
            'url' => env('APP_URL') . '/storage/blog/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],
        'ProductThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/product/thumbnails'),
            'url' => env('APP_URL') . '/storage/product/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],

        'ProductImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/product/images'),
            'url' => env('APP_URL') . '/storage/product/images',
            'visibility' => 'public',
            'throw' => false,
        ],
        'EventThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/event/thumbnails'),
            'url' => env('APP_URL') . '/storage/event/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],

        'EventFiles' => [
            'driver' => 'local',
            'root' => storage_path('app/public/event/files'),
            'url' => env('APP_URL') . '/storage/event/files',
            'visibility' => 'public',
            'throw' => false,
        ],

        'ProfileThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/profile/thumbnails'),
            'url' => env('APP_URL') . '/storage/profile/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],
        'AlbumThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/album/thumbnails'),
            'url' => env('APP_URL') . '/storage/album/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],


        'AlbumImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/album/images'),
            'url' => env('APP_URL') . '/storage/album/images',
            'visibility' => 'public',
            'throw' => false,
        ],


        'ProjectThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/project/thumbnails'),
            'url' => env('APP_URL') . '/storage/project/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],


        'TrainingThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/training/thumbnails'),
            'url' => env('APP_URL') . '/storage/training/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],

        'TeamThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/team/thumbnails'),
            'url' => env('APP_URL') . '/storage/team/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],
        'CourseThumbnail' => [
            'driver' => 'local',
            'root' => storage_path('app/public/course/thumbnails'),
            'url' => env('APP_URL') . '/storage/course/thumbnails',
            'visibility' => 'public',
            'throw' => false,
        ],

        'CourseResources' => [
            'driver' => 'local',
            'root' => storage_path('app/public/course/resources'),
            'url' => env('APP_URL') . '/storage/course/resources',
            'visibility' => 'public',
            'throw' => false,
        ],

        'PartnersLogo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/partners/logo'),
            'url' => env('APP_URL') . '/storage/partners/logo',
            'visibility' => 'public',
            'throw' => false,
        ],

        'ApplicantsAssets' => [
            'driver' => 'local',
            'root' => storage_path('app/public/applicants/assets'),
            'url' => env('APP_URL') . '/storage/applicants/assets',
            'visibility' => 'public',
            'throw' => false,
        ],





        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('BlogThumbnail') => storage_path('app/public/blog/thumbnails'),
        public_path('ProductThumbnail') => storage_path('app/public/product/thumbnails'), 
        public_path('ProductImages') => storage_path('app/public/product/images'),
        public_path('EventThumbnail') => storage_path('app/public/event/thumbnails'),
        public_path('EventFiles') => storage_path('app/public/event/files'),
        public_path('ProjectThumbnail') => storage_path('app/public/project/thumbnails'),
        public_path('ProfileThumbnail') => storage_path('app/public/profile/thumbnails'),
        public_path('AlbumThumbnail') => storage_path('app/public/album/thumbnails'),
        public_path('AlbumImages') => storage_path('app/public/album/images'),
        public_path('TrainingThumbnail') => storage_path('app/public/training/thumbnails'),
        public_path('TeamThumbnail') => storage_path('app/public/team/thumbnails'),
        public_path('CourseThumbnail') => storage_path('app/public/course/thumbnails'),
        public_path('CourseResources') => storage_path('app/public/course/resources'),
        public_path('PartnersLogo') => storage_path('app/public/partners/logo'),
        public_path('ApplicantsAssets') => storage_path('app/public/applicants/assets'),

    ],

];
