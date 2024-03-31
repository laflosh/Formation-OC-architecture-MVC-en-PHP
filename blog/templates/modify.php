<?php $title = "Modification de contenue"; ?>

<?php ob_start();?>

<h1>Le super blog de l'AVBN</h1>
<p><a href="index.php?action=post&id=<?=urlencode($post->identifier)?>">Retour</a></p>

<h2>Effectuer vos modifications</h2>

<form action="index.php?action=modifyPost&id=<?= $post->identifier?>" method="post">

  <div>

    <label for="title">Titre</label><br/>
    <input type="text" id="title" name="title" value=<?= $post->title?>>

  </div>

  <div>

    <label for="title">Contenue du billet</label><br/>
    <textarea id="title" name="title"><?= $post->content?></textarea>

  </div>

  <div>
    <input type="submit"/>
  </div>

</form>

<?php $content = ob_get_clean(); ?>

<?php require("layout.php")?>