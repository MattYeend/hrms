<?php

declare(strict_types=1);

namespace App\Pipelines\Comments;

use Closure; 

final readonly class RemoveSpam
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private const SPAM_KEYWORDS = [
        'buy now', 
        'free money', 
        'pyramid scheme', 
        'buy', 
        'no deposit', 
        'spin now', 
        'winner'
    ];

    public function __invoke(string $comment, Closure $next): string{
        $comment = str_replace(
            search: self::SPAM_KEYWORDS,
            replace: '****',
            subject: $comment
        );
        return $next($comment);
    }
}
