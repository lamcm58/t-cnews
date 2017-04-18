<?php

namespace App\Repositories\Comment;

interface CommentRepositoriesInterface
{
    /**
     * Check if comment valid
     *
     * @param integer $id
     */
    public function checkComment($id);

    /**
     * Delete comment
     *
     * @param integer $id
     */
    public function destroyComment($id);

    /**
     * Count number of comment
     */
    public function countComment();

    /**
     * Create new comment
     *
     * @param array $request
     */
    public function createComment($request = []);
}
