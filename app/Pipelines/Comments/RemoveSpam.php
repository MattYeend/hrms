<?php

namespace App\Pipelines\Comments;

class RemoveSpam
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the data (comment) passing through the pipeline
     * 
     * @param mixed $comment
     * @param \Closure $next
     * @return mixed
     */
    public function handle($comment, \Closure $next){
        // Check if the comment contains spam
        if ($this->isSpam($comment)){
            $comment->is_spam = true;
        }
        
        return $next($comment); // Pass the comment to the next step in the pipeline
    }

    /**
     * Check if the comment is considers spam
     * 
     * @param mixed $comment
     * @return bool
     */
    protected function isSpam($comment){
        $spamKeywords = ['buy now', 'free money', 'pyramid scheme', 'buy', 'no deposit', 'spin now', 'winner'];
        foreach($spamKeywords as $keyword){
            if(stripos($comment->content, $keyword) !== false){
                return true;
            }
        }
        return false;
    }
}
