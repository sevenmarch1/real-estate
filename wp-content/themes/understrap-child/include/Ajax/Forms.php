<?php

namespace Vnet\Ajax;

use Vnet\Entities\PostEstate;
use Vnet\Helpers\ArrayHelper;

class Forms extends Core
{

    /**
     * - Форма добавления объекта недвижимости
     */
    function sendEstate()
    {

        $title = ArrayHelper::getRequest('title');
        $square = ArrayHelper::getRequest('square');
        $price = ArrayHelper::getRequest('price');
        $houseroom = ArrayHelper::getRequest('houseroom');
        $floor = ArrayHelper::getRequest('floor');
        $address = ArrayHelper::getRequest('address');

        $data = [
            'square' => $square,
            'price' => $price,
            'houseroom' => $houseroom,
            'floor' => $floor,
            'address' => $address,
        ];

        $postId = PostEstate::create($title, $data);

        if(!$postId){
            $this->theError();
        }

        $this->theSuccess([
            'message' => __('Ваши данные успешно отправлены.'),

        ]);
    }
}
