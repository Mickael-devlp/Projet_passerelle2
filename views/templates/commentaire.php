
<!-- 1ère partie pour afficher les commentaires. correction de l'ia, ça se fait mais pas ouff -->
<div class="comments-display">
    <h3>Commentaires </h3>

    <?php if (empty($all_comments)): ?>
    <?php else: ?>
        <?php foreach ($all_comments as $com): ?>
            <div class="comment-single">
                <div class="comment-header">
                    <strong><?= htmlspecialchars($com['pseudonyme']) ?></strong>
                    <span style="font-size: 0.8em; color: #666;">
                        Posté le <?= date('d/m/Y à H:i', strtotime($com['created_at'])) ?>
                    </span>
                </div>
                <div class="comment-content">
                    <?= nl2br(htmlspecialchars($com['contenu'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Jolie ligne de séparation (mettre style directement puisque non réutilisé) -->
<hr style="margin: 40px 0; border: 0; border-top: 1px solid #c8ad7f;">


<!-- 2ème partie : Pour créer le commentaire -->
<section class="comment-section">
    <h3 classe="h3-commentaire">Laisser un commentaire</h3>

    <?php if (isset($_SESSION['user'])): ?>
        
        <form action="/MESBG/controllers/post_comment.php" method="POST" class="comment-form">
            <input type="hidden" name="article_id" value="<?= $_GET['id'] ?>">

            <div class="input-group">
                <label for="contenu">Voulez-vous laisser un commentaire ?</label>
                <textarea name="contenu" id="contenu" rows="6" placeholder="Écrivez votre message ici..." required></textarea>
            </div>

            <button type="submit" name="send-content" class="btn-submit">Publier le commentaire</button>
        </form>

    <?php else: ?>
        <div class="login-required">
            <p>Vous devez être connecté pour publier un commentaire.</p>
            <a href="http://localhost/MESBG/index.php?page=connexion" class="button-log">Se connecter</a>
        </div>
    <?php endif; ?>
</section>