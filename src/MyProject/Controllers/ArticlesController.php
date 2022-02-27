<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\ForbiddenUserException;
use MyProject\Models\Articles\Comments;

class ArticlesController extends AbstractController
{
    

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }

    public function edit (int $articleId) : void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if($this->user === null) {
            throw new UnauthorizedException();
        }
        if($this->user->isAdmin()!==true) {
            throw new ForbiddenUserException('Для редактирования статьи нужно обладать правами администратора');
        }

        if (!empty($_POST)) {
            try{
                $article->updateFromArray($_POST);
            } catch(InvalidArgumentException  $e){
                $this->view->renderHtml('articles/edit.php', ['error'=>$e->getMessage(), 'article'=>$article]);
                return;
            } 
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
               
    }

    public function comments(int $articleId): void
    {   $article = Article::getByID($articleId);
        

        if($this->user === null) {
            throw new UnauthorizedException('Для добавления комментариев к статье нужно зарегистрироваться');
        }
       

        if (!empty($_POST)){
            
            Comments::createComments($_POST, $this->user, $article ->getId());
        } 
        $comments = Comments::findAll();
        $this->view->renderHtml('articles/comments.php', ['article' => $article, 'comments'=> $comments]);
    }

    public function commentsEdit(int $commentId): void
    {
        
        $comments = Comments::getById($commentId);
        $articleId = $comments->getArticleId();
        $article = Article::getById($articleId);

        if(!empty($_POST)) {
            try{
                $comments->editComments($_POST);
            } catch(InvalidArgumentException  $e){
                $this->view->renderHtml('articles/comments_edit.php', ['error'=>$e->getMessage(), 'comments'=>$comments]);
                return;
            }
            header('Location: /articles/' . $comments->getArticleId() . '/comments', true, 302);
            exit();
        }
        $this->view->renderHtml('articles/comments_edit.php', ['comments'=>$comments, 'article' => $article]);
    }

    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
      
        
        if($this->user->isAdmin()!==true) {
            throw new ForbiddenUserException('Для добавления статьи нужно обладать правами администратора');
        }
        
        if(!empty($_POST)){
            try {
                $article= Article::createFromArray($_POST, $this->user);
            }catch(InvalidArgumentException $e){
                $this->view->renderHtml('articles/add.php',['error'=>$e->getMessage()]);
                return;
            }
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
      
    }


   

    public function delete (int $id) : void
    {
        $article = Article::getById($id);
        if($article) {
            
            $article -> delete();
            echo 'Статья # ' . $id .  ' удалена';
        } else {
            echo 'Статья не найдена';
        }
    }

    public function commentsDelete(int $commentId)
    {
        $comments = Comments::getById($commentId);
        $articleId = $comments->getArticleId();
        $article = Article::getById($articleId);
        if ($comments) {
            $comments -> delete();
        }
        
        $this->view->renderHtml('articles/commentsDelete.php', ['article' => $article]);
    }
}
