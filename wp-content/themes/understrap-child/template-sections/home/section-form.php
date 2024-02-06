<section class="section-estate">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?= __('Форма добавления объекта недвижимости'); ?></h1>
    </div>
    <div class="album py-5">
        <div class="container">
            <form data-ajax-url="" >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="square">Площадь</label>
                        <input type="text" class="form-control" id="square" placeholder="Площадь" require>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Стоимость </label>
                        <input type="text" class="form-control" id="price" placeholder="Стоимость">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="houseroom">Жилая площадь</label>
                        <input type="text" class="form-control" id="houseroom" placeholder="Жилая площадь">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor">Этаж </label>
                        <input type="text" class="form-control" id="floor" placeholder="Этаж">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" placeholder="Адрес">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</section>