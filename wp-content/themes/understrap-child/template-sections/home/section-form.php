<?php

use Vnet\Ajax\Forms;
?>
<section class="section-estate">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?= __('Форма добавления объекта недвижимости'); ?></h1>
    </div>
    <div class="album py-5">
        <div class="container">
            <form class="estateForm" data-ajax-url="<?= Forms::getInstance()->getUrl('sendEstate') ?>">
                <div class="form-group">
                    <label for="title"><?= __('Название'); ?></label>
                    <input type="text" class="form-control" name="title" placeholder="<?= __('Название'); ?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="square"><?= __('Площадь'); ?></label>
                        <input type="text" class="form-control" name="square" placeholder="<?= __('Площадь'); ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price"><?= __('Стоимость'); ?></label>
                        <input type="text" class="form-control" name="price" placeholder="<?= __('Стоимость'); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="houseroom"><?= __('Жилая площадь'); ?></label>
                        <input type="text" class="form-control" name="houseroom" placeholder="<?= __('Жилая площадь'); ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor"><?= __('Этаж'); ?></label>
                        <input type="text" class="form-control" name="floor" placeholder="<?= __('Этаж'); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address"><?= __('Адрес'); ?></label>
                    <input type="text" class="form-control" name="address" placeholder="<?= __('Адрес'); ?>" required>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" accept=".jpg,.png" />
                        <label class="custom-file-label" for="file"><?= __('Добавте изображение'); ?></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><?= __('Отправить'); ?></button>
            </form>
        </div>
    </div>
</section>