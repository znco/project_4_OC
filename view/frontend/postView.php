<?php 

$title = 'Mon blog'; 
ob_start(); 
?>      <div class="col-sm-12 mb-5 blog-post__info">
            <i class="fas fa-user mr-2"></i><span><?= $post['author']; ?></span>
            <i class="far fa-clock ml-5 mr-2"></i><span><?= $post['create_date_fr']; ?></span>
        </div>
        <div class="col-sm-12 mb-3">
            <h1><?= $post['title'] ?></h1>
        </div>
        <div class="col-sm-12">
            <!-- <p><a href="index.php">Retour à la liste des billets</a></p> -->
        </div>
        <div class="col-sm-12">
            <div class="news mb-5">
                <p><?= $post['content']; ?></p>
            </div>

            <h2 class="mb-5">Commentaires</h2>

            <?php
            while ($comment = $comments->fetch())
            {
            ?>
                <div class="comment mb-5 pb-5">
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> 
                        
                        <a href="index.php?action=viewComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $post['id'] ?>">modifier</a>
                        <a href="index.php?action=deleteComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $post['id'] ?>">effacer</a>
                    </p>
                    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <p>le <?= $comment['comment_date_fr'] ?> </p>
                </div>
            <?php
            }
            ?>
            <h3 class="mb-5">Donnez votre avis</h3>
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group mb-4">
                    <input type="text" class="form-control" id="author" name="author" aria-describedby="emailHelp" placeholder="Votre pseudo" />
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <textarea  class="form-control" id="comment" name="comment" placeholder="Votre commentaire"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-dark">Envoyer</button>
                </div>
            </form>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('templateHome.php'); ?>