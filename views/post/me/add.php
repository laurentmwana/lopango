<?php

$form = new \Controller\HTML\Forms($_POST);



?>
<div class="ui sizer vertical segment">
  <div class="ui huge header">Nouveau My lopango</div>
  <p>Je veux ajouter un nouveau lopango (:</p>
</div>

<div class="ui two column grid">
    <div class="column"></div>
    <div class="row">
        <div class="column">
            
            <form action="" class="ui form" method="POST">
                <?= $form->input('@text', 'name', 'Nom de lopango') ?>
                <?= $form->input('@text', 'adress', 'Adresse de lopango') ?>
                <?= $form->input('@text', 'respons', 'Nom du responsable') ?>
                <?= $form->input('@number', 'porte', 'Nombre de porte') ?>
                <?= $form->button('@submit', 'save', 'Enregistrer', 'save') ?>
            </form>
        </div>
        <div class="column"></div>
    </div>
</div>


<?php


var_dump($_POST);
