<?php

declare(strict_types=1);

namespace App\Pipelines\FileHandling;

use Closure;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

final readonly class ResizeImage
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function __invoke(UploadedFile $file, Closure $next): UploadedFile{
        $image = Image::make($file->getPathname())->resize(800, 600);
        $image->save();
        return $next($file);
    }
}
