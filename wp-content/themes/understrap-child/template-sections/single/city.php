<?php

use Vnet\Entities\PostCity;

$city = PostCity::getCurrent();
$estates = $city->getEstates();

?>
<section class="section-single-estate">
    <div class="container">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5"><?= $city->getTitle(); ?></h2>
            </div>
            <?php if (!empty($estates)) { ?>
                <div class="bg-white box-shadow mx-auto" style="width: 50%; border-radius: 21px 21px 0 0;">
                    <h5 class="display-5"><?= __('Объекты недвижимости в этом городе:'); ?></h5>
                    <div class="list-group">
                        <?php foreach ($estates as $item) { ?>
                            <a href="<?= $item->getPermalink(); ?>" class="list-group-item list-group-item-action"><?= $item->getTitle(); ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>