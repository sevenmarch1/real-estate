<?php

namespace Vnet\Ajax;

class Forms extends Core
{

    /**
     * - Форма добавления объекта недвижимости
     */
    function sendEstate()
    {
        $this->theSuccess([
                'message' => __('Ваши данные успешно отправлены.'),

        ]);
    }

}
