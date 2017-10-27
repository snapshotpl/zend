<?php

namespace PhpBenchmarksZend\RestApi\Transformer;

use PhpBenchmarksRestData\Comment;
use PhpBenchmarksRestData\CommentType;
use PhpBenchmarksRestData\User;
use Zend\I18n\Translator\TranslatorInterface;

class RestApiTransformer
{
    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /** @param User[] $users */
    public function usersToArray(array $users)
    {
        $return = [];
        foreach ($users as $user) {
            $return[] = $this->userToArray($user);
        }

        return $return;
    }

    public function userToArray(User $user)
    {
        return [
            'id' => $user->getId(),
            'login' => $user->getLogin(),
            'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
            'translated' => $this->translator->translate('translated.1000'),
            'comments' => $this->commentsToArray($user->getComments())
        ];
    }

    /** @param Comment[] $comments */
    public function commentsToArray(array $comments)
    {
        $return = [];
        foreach ($comments as $comment) {
            $return[] = $this->commentToArray($comment);
        }

        return $return;
    }

    public function commentToArray(Comment $comment)
    {
        return [
            'id' => $comment->getId(),
            'message' => $comment->getMessage(),
            'translated' => $this->translator->translate('translated.2000'),
            'type' => $this->commentTypeToArray($comment->getType())
        ];
    }

    public function commentTypeToArray(CommentType $commentType)
    {
        return [
            'id' => $commentType->getId(),
            'name' => $commentType->getName(),
            'translated' => $this->translator->translate('translated.3000'),
        ];
    }
}
