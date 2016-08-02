<div id="magazine-command-list" class="content container-content">

    <div class="command-list">
        <?php foreach($team as $teamMember):?>
        <?=$this->render('index/member-block',[
            'teamMember'=>$teamMember
        ]) ?>
            <?php endforeach; ?>
    </div>
</div>