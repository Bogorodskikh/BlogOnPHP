<?php
namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;

class Comments extends ActiveRecordEntity
{
    /** @var string */
    protected $authorId;

    /** @var string */
    protected $articleId;

     /** @var string */
     protected $text;

    /** @var string */
    protected $createdAt;

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setArticleId(int $articleId): void
    {
        $this -> articleId = $articleId;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): string
    {
       return $this->text;
    }
    public function getArticleId(): int
    {
        return $this -> articleId;
    } 

   


    public static function createComments(array $fields, User $authorId, int $articleId): self
    {
       
        
        $comments = new Comments;
        $comments->setAuthor($authorId);
        $comments -> setArticleId($articleId);
        $comments -> setText($fields['comments']);
        $comments->save();

        return $comments;        
    }

    public  function editComments(array $fields): self
    {
        if(empty($fields['comments'])) {
            throw new InvalidArgumentException('Нет комментариев');
        }
              
        $this -> setText($fields['comments']);
        $this->save();

        return $this;  

    }

    

    protected static function getTableName(): string
    {
        return  'comments';
    }


}