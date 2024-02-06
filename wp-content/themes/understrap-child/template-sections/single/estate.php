<?php

use Vnet\Entities\PostEstate;

$estate = PostEstate::getCurrent();
$types = $estate->getTypes();
?>
<section class="section-single-estate">
    <div class="container">
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5"><?= $estate->getTitle(); ?></h2>
                <?php if ($types) {
                    foreach ($types as $item) { ?>
                        <span class="badge badge-primary"><?= $item->name; ?></span>
                <?php }
                } ?>
            </div>
            <div class="bg-white box-shadow mx-auto" style="width: 50%; height: 300px; border-radius: 21px 21px 0 0;">
                <?php if ($src = $estate->getImage('full')) { ?>
                    <img class="card-img-top" src="<?= $src; ?>" alt="img">
                <?php } ?>
            </div>
            <?php if ($characteristics = $estate->getCharacteristics()) { ?>
                <ul class="list-group">
                    <?php foreach ($characteristics as $key => $value) { ?>
                        <li class="list-group-item"><strong><?= $key; ?></strong> : <?= $value; ?></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</section>