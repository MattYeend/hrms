<?php

declare(strict_types=1);

namespace App\Pipelines\Comments;

use Closure;

final readonly class RemoveProfanity
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private const PROFANITIES = [
        'fuck',
        'twat',
        'dick',
        'prick',
        'cunt',
        'pillock',
        'knob',
        'knobhead',
        'dickhead'
    ];

    public function __invoke(string $comment, Closure $next): string{
        $comment = str_replace(
            search: self::PROFANITIES,
            replace: '****',
            subject: $comment
        );
        return $next($comment);
    }
}
