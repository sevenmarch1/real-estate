<?php

namespace Vnet\Ajax;

use Vnet\Helpers\ArrayHelper;
use Vnet\Helpers\Path;
use Vnet\Helpers\Str;
use Vnet\Loader;
use Vnet\Traits\Instance;

class Core
{

    use Instance;

    protected static $urlBase = '/ajax/';



    static function isAjax(): bool
    {
        return defined('IS_THEME_AJAX');
    }


    /**
     * - Получает ссылку на ajax запрос
     * @param string $action [optional]
     * @param array $getParams [optional]
     * 
     * @return string
     */
    function getUrl($action = '', $getParams = [])
    {
        $url = Path::join(self::$urlBase, Str::getClassName(get_called_class()), $action);

        if ($getParams) {
            $url .= '?' . http_build_query($getParams);
        }

        return $url;
    }


    protected function getRequest(string $key, $def = null)
    {
        return ArrayHelper::getRequest($key, $def);
    }


    /**
     * - Валидирует запрос
     * - Отдаст ответ и прекратит выполнение скрипта в случае ошибки
     * @param array $sets 
     * @return void 
     */
    protected function validate(array $sets)
    {
        // только авторизованные пользователь могут выполнять ajax запрос
        if (!empty($sets['protected']) && !is_user_logged_in()) {
            http_response_code(401);
            exit;
        }
    }

    protected function theError($res = 'serverError', $code = 500)
    {
        http_response_code($code);
        $res = $this->getResponseArgs($res);
        $res['status'] = 'error';
        $this->theResponse($res);
    }


    protected function theSuccess($res = [], $code = 200)
    {
        http_response_code($code);
        $res = $this->getResponseArgs($res);
        $res['status'] = 'success';
        $this->theResponse($res);
    }

    protected function sendAnswer(string $statusMess, string $succesMess, string $errorMess, bool $sendEmail = false)
    {
        if ($sendEmail == true) {
            $args = [
                "data" => [
                    "responseStatus" => $statusMess,
                    "formMsg" => $succesMess,
                    "clearForm" => true,
                    "autoclose" => true
                ]
            ];

            $this->theSuccess($args);
        } else {
            $args = [
                "data" => [
                    "formMsg" => $errorMess,
                ]
            ];

            $this->theError($args);
        }
    }

    private function theResponse($res = [])
    {
        header('Content-Type: application/json');
        echo json_encode($res, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        exit;
    }



    private function getResponseArgs($res = [])
    {
        if (!$res) return [];

        if (!is_array($res)) {
            $msg = $res;
            $res = [];
            $res['msg'] = $msg;
        }

        if (!empty($res['msg'])) {
            $res['msg'] = Loader::getInstance()->getMessage($res['msg']);
        }

        if (!isset($res['data'])) {
            $res['data'] = [];
        }

        return $res;
    }
}
