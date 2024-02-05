<?php

namespace Vnet\Helpers;

class Acf
{

    /**
     * - Кэш полей в пост запросе
     * @var array
     */
    private static $postFields = null;


    /**
     * - Получает поле acf из post запроса
     * @param string|string[] $fieldName ключ либо массив вложенных ключей
     * @param mixed $def
     * @return mixed
     */
    static function getPostFieldValue($fieldName, $def = null)
    {
        return ArrayHelper::get(self::getPostFields(), $fieldName, $def);
    }


    /**
     * - Получает acf поля из пост запроса
     * - Заменяет ключи на их соответствующие name
     * (по умолчанию в пост запросе приходят ключи полей)
     * @return array 
     */
    static function getPostFields(): array
    {
        if (self::$postFields === null) {
            self::$postFields = self::fetchPostFields();
        }
        return self::$postFields;
    }


    private static function fetchPostFields(?array $fields = null): array
    {
        $res = [];

        if (empty($_POST['acf'])) {
            return $res;
        }

        $fields = $fields ?? $_POST['acf'];

        foreach ($fields as $fieldKey => $fieldVal) {

            $fieldName = $fieldKey;

            if (preg_match("/^field_/", $fieldKey)) {
                $field = acf_get_field($fieldKey);

                if (!$field) {
                    continue;
                }

                $fieldName = $field['name'];
            }

            if (is_array($fieldVal)) {
                $res[$fieldName] = self::fetchPostFields($fieldVal);
            } else {
                $res[$fieldName] = $fieldVal;
            }
        }

        return $res;
    }


    public static function getField(string $selector, $postId = false, $formatValue = true)
    {
        if (!function_exists('get_field')) {
            return null;
        }
        return get_field($selector, $postId, $formatValue);
    }
}
