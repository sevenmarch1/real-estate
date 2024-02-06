<?php

use Vnet\Helpers\ArrayHelper;

$estates = ArrayHelper::get($this->args, 'estates');

if (empty($estates)) { ?>
    <p>Недвижимость не найдена</p>
<?php } else { ?>
    <select class="js-estates-multiple" name="estates[]" multiple="multiple" style="width: 100%;">
        <?php foreach ($estates as $item) { ?>
            <option value="<?= $item->getId(); ?>" ><?= $item->getTitle(); ?></option>
        <?php } ?>
    </select>
<?php } ?>