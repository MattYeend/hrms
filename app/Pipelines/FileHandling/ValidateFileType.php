<?php

declare(strict_types=1);

namespace App\Pipelines\FileHandling;

use Closure;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final readonly class ValidateFileType
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private const ALLOWED_TYPES = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'application/pdf'
    ];

    public function __invoke(UploadedFile $file, Closure $next): UploadedFile{
        if(!in_array($file->getMimeType(), self::ALLOWED_TYPES, true)){
            throw new \InvalidArgumentException('Invalid file type.');
        }
        return $next($file);
    }
}
