<?php $title = "Le Blog de l'AVBN";?>

<?php ob_start();?>

<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach($posts as $post) {
?>

  <div class="news">

    <h3>

      <?= htmlspecialchars($post->title); ?>

      <em>le <?= $post->frenchCreationDate; ?></em>

    </h3>

    <p>

      <?= nl2br ( htmlspecialchars( $post->content)); ?>
      <br />
      <em><a href="index.php?action=post&id=<?=urlencode($post->identifier)?>">Commentaires</a></em>

    </p>

  </div>

<?php } ?>

<h2>Publier un nouveau billet</h2>

<form action="index.php?action=addPost" method="post">

  <div>

    <label for="title">Titre du billet</label><br/>
    <input type="text" id="title" name="title"/>

  </div>

  <div>

    <label for="content">Contenue</label><br/>
    <textarea id="content" name="content"></textarea>

  </div>

  <div>
    <input type="submit"/>
  </div>

</form>

<?php $content = ob_get_clean(); ?>

<?php require("layout.php")?>
