<div role="tabpanel" class="tab-pane  clearfix" id="subscriber-existing">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Имя</th>
            <th>email</th>
            <th>Телефон</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($user_model as $item) :  ?>
            <tr>
                <td><?= $item->first_name; ?> <?= $item->last_name; ?></td>
                <td><?= $item->contact_email; ?></td>
                <td><?php $data = str_replace('[', '', $item->phone);
                    $data = str_replace(']', '', $data);
                    $data = str_replace('"', ' ', $data);
                    echo $data; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>