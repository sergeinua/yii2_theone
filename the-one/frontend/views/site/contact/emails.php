

<div class="c-b mail"><span class="fa-envelope"></span>
    <div class="divider"></div>
    <div class="content">
        <?php
            foreach($emails as $email){
                ?>
                <a href="mailto:<?=$email ?>" role="link"><?=$email ?></a>
        <?php
            }
        ?>
    </div>
</div>