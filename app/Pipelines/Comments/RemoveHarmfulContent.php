<?php

declare(strict_types=1);

namespace App\Pipelines\Comments;

use Closure;

final readonly class RemoveHarmfulContent
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private const HARMFUL_CONTENT = [
        'hate speech',
        'violence',
        'threats',
        'targeting',
        'islamophobic',
        'homophobic'
    ];

    public function __invoke(string $comment, Closure $next): string{
        $comment = str_replace(
            search: self::HARMFUL_CONTENT,
            replace: '****',
            subject: $comment
        );
        return $next($comment);
    }
}
