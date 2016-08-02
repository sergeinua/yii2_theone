<!--<div id="magazine-command" class="content container-content">-->
<!--    <div class="about-holder">-->
<!--        <div class="about-description">-->
<!--            <h2 class="h1 page-title">Команда</h2>-->
<!--            --><?//=$teamMember->top_quote ?>
<!--        </div>-->
<!--        <div class="about">-->
<!--            <div class="img-holder"><img src="--><?//= $this->getImgUrl($teamMember->photo);?><!--" id="command-avatar">-->
<!--                <div class="name">--><?//=$teamMember->name ?><!--</div>-->
<!--            </div>-->
<!--            <div class="text-holder">-->
<!--                <h2 class="post-title divider-title">--><?//=$teamMember->profession ?><!--</h2><a href="#" id="show-command-details" class="btn more">Подробнее</a>-->
<!--                <div class="details">--><?//=$teamMember->main_quote ?><!--</div>-->
<!--                --><?//=$this->render('member/socials-list',
//                    [
//                        'teamMember'=>$teamMember
//                    ])?>
<!--            </div>-->
<!--            <div id="command-details" class="command-details-popup">-->
<!--                <h3 class="name">--><?//=$teamMember->name ?><!--</h3>-->
<!--                <p class="description">--><?//=$teamMember->top_quote ?><!--</p>-->
<!--                --><?//=$this->render('member/socials-list',
//                    [
//                        'teamMember'=>$teamMember
//                    ])?>
<!--                <a href="#" id="close-command-details" class="btn close fa-times"> Закрыть</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="pagination-block">-->
<!--        <ul role="menu" class="pager">-->
<!--            --><?php //if($prev): ?>
<!--            <li role="menuitem" class="pre"><a href="--><?//=\yii\helpers\Url::to(['/team/'.$prev->slug])?><!--" aria-label="Previous" role="link" class="btn"><i class="fa fa-arrow-left"></i></a></li>-->
<!--            --><?php //endif;?>
<!--            <li role="menuitem" class="current"><a href="--><?//=\yii\helpers\Url::to(['/team'])?><!--" aria-label="Current" role="link" class="btn">-->
<!--                    <div class="quad"></div>-->
<!--                    <div class="quad"></div></a></li>-->
<!--            --><?php //if($next): ?>
<!--            <li role="menuitem" class="next"><a href="--><?//=\yii\helpers\Url::to(['/team/'.$next->slug])?><!--" aria-label="Next" role="link" class="btn"><i class="fa fa-arrow-right"></i></a></li>-->
<!--            --><?php //endif; ?>
<!--        </ul>-->
<!--    </div>-->
<!---->






    <div id="magazine-command" class="container-content content">
        <h1 class="h2">Команда</h1>
        <?= $teamMember->top_quote; ?>
        <div class="about-holder">
            <div class="about">
                <div class="img-holder"><img src="<?= $this->getImgUrl($teamMember->photo); ?>" id="command-avatar">
                    <div class="h3 name"><?= $teamMember->name; ?></div>
                </div>
                <div class="text-holder">
                    <h3 class="post-title divider-title"><?= $teamMember->profession; ?></h3>
                    <div class="details"><?= $teamMember->main_quote; ?></div>
                    <?= $this->render('member/socials-list', [ 'teamMember' => $teamMember ]); ?>
                </div>
            </div>
            <div class="pagination-block">
                <ul role="menu" class="pager">
                    <?php if($prev) : ?>
                        <li role="menuitem" class="pre"><a href="<?= \yii\helpers\Url::to(['/team/' . $prev->slug]); ?>" aria-label="Previous" role="link" class="btn"><i class="fa fa-arrow-left"></i></a></li>
                    <?php endif;?>
                    <li role="menuitem" class="current"><a href="<?= \yii\helpers\Url::to(['/team']); ?>" aria-label="Current" role="link" class="btn">
                            <div class="quad"></div>
                            <div class="quad"></div></a></li>
                    <?php if($next) : ?>
                        <li role="menuitem" class="next"><a href="<?= \yii\helpers\Url::to(['/team/'.$next->slug]); ?>" aria-label="Next" role="link" class="btn"><i class="fa fa-arrow-right"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
