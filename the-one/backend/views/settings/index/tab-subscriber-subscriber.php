<div role="tabpanel" class="tab-pane active clearfix" id="subscriber-subscriber">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Имя</th>
            <th>email</th>
            <th>Телефон</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subscriber_model as $item) :  ?>
            <tr>
                <td><?= $item->name; ?></td>
                <td><?= $item->email; ?></td>
                <td><?= $item->telephone; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>