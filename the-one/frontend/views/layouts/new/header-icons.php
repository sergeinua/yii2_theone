<div class="icon-block">
    <?php $cnt = 1; ?>
    <?php foreach($this->context->params['professional-groups'] as $group){
        $rest = $cnt%7;
    ?>
            <?php if($rest===0){ ?>
                <div class="icon-list">
            <?php } ?>
                    <!-- This line is commented until further modifications would be made, just uncomment this line to make links clickable -->
                <!--a href="<!?= \yii\helpers\Url::to('/professionals/' . $group->slug) ?>" role="link"  class="icon icon-<!?= $group->slug ?>"><!?= $group->name ?></a-->
                <a href="#" role="link"  class="icon icon-<?= $group->slug ?>"><?= $group->name ?></a>
            <?php if($rest===0){ ?>
                </div>
            <?php } ?>
    <?php } ?>
</div>