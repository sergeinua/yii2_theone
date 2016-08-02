<div class="social">
    <ul role="menu">
        <?php if(!empty($teamMember->soc_fb)): ?>
            <li role="menuitem"><a href="<?=$teamMember->soc_fb ?>" role="link" class="fa-facebook"></a></li>
        <?php endif; ?>
        <?php if(!empty($teamMember->soc_vk)): ?>
            <li role="menuitem"><a href="<?=$teamMember->soc_vk ?>" role="link" class="fa-vk"></a></li>
        <?php endif; ?>
        <?php if(!empty($teamMember->soc_tw)): ?>
            <li role="menuitem"><a href="javascript:void(0)" role="link" class="fa-twitter"></a></li>
        <?php endif; ?>
        <?php if(!empty($teamMember->soc_in)): ?>
            <li role="menuitem"><a href="javascript:void(0)" role="link" class="fa-instagram"></a></li>
        <?php endif; ?>
    </ul>
</div>