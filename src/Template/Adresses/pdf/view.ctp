<div class="adresses view large-9 medium-8 columns content">
    <h3><?= h($adress->adress) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('adress') ?></th>
            <td><?= h($adress->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('city') ?></th>
            <td><?= h($adress->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('zip_code') ?></th>
            <td><?= h($adress->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= $adress->province ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $adress->country ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= $adress->details ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $adress->created ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= $adress->modified ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User ID') ?></th>
            <td><?= $adress->user_id ?></td>
        </tr>
        
      
    </table>
</div>
