<?php

use Vnet\Entities\PostCity;

$citys = PostCity::getActive();
if (empty($citys)) {
    return;
}
?>
<section class="section-estate">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?= __('Города'); ?></h1>
    </div>
    <div class="album py-5">
        <div class="container">
            <div class="row">
                <?php foreach ($citys as $item) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <?php if ($src = $item->getImage('full')) { ?>
                                <img class="card-img-top" src="<?= $src; ?>" alt="img">
                            <?php } else { ?>
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18d7728ccf1%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18d7728ccf1%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71249771118164%22%20y%3D%22120.18000011444092%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                            <?php } ?>
                            <div class="card-body">
                                <h3 class="mb-0">
                                    <a class="text-dark" href="<?= $item->getPermalink(); ?>"><?= $item->getTitle(); ?></a>
                                </h3>
                                <p class="card-text"><?= $item->getContent(); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="<?= $item->getPermalink(); ?>" role="button"><?= __('Подробнее'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>