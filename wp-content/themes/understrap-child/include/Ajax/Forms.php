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

        $file = false;

        if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){
            $file = $_FILES['file'];
        }

        $data = [
            'square' => $square,
            'price' => $price,
            'houseroom' => $houseroom,
            'floor' => $floor,
            'address' => $address,
        ];

        $postId = PostEstate::create($title, $data, $file);

        if(!$postId){
            $this->theError();
        }

        $this->theSuccess([
            'message' => __('Ваши данные успешно отправлены.'),

        ]);
    }
}
