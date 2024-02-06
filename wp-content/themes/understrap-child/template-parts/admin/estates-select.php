<?php

use Vnet\Helpers\ArrayHelper;

$estates = ArrayHelper::get($this->args, 'estates');
$checked = ArrayHelper::get($this->args, 'checked');

if (empty($estates)) { ?>
    <p>Недвижимость не найдена</p>
<?php } else { ?>
    <select class="js-estates-multiple" name="estates[]" multiple="multiple" style="width: 100%;">
        <?php foreach ($estates as $item) { ?>
            <option value="<?= $item->getId(); ?>" <?= in_array($item->getId(), $checked) ? 'selected' : ''; ?>><?= $item->getTitle(); ?></option>
        <?php } ?>
    </select>
<?php } ?>