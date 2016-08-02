<?php
namespace frontend\components;

use yii\helpers\ArrayHelper;

class OneHtml extends \yii\helpers\Html{
    public static function activeColorCheckboxList($model, $attribute, $items, $options = [])
    {
        return static::activeListInput('colorCheckboxList', $model, $attribute, $items, $options);
    }

    //now its old code
    public static function colorCheckboxList($name, $selection = null, $items = []) {
        if (substr($name, -2) !== '[]') {
            $name .= '[]';
        }
        $colors = ArrayHelper::index($items,'slug');
        $returnContent = '';
        foreach($colors as $slug=>$color){

            $selected = is_array($selection)&&in_array($slug,$selection);
            $returnContent .= self::colorCheckbox($selected,$color,$name);
        }
        return $returnContent;

    }

    public static function colorCheckbox($checked,$color,$name){
        $template = "";
        $checked = $checked?'checked':'';
        return <<<TMPL
                <div class="pallete-block">
                    <input role="input" type="checkbox" name = "{$name}" {$checked} id="{$color->slug}" value={$color->slug}>
                    <label for="{$color->slug}" class="has-tooltip" style="background-color:{$color->hex}">
                      <div class="tooltip top">
                        <p>{$color->name}</p>
                      </div>
                    </label>
                  </div>
TMPL;
    }



    public static function activeRadio($model, $attribute, $options = [])
    {
        $name = isset($options['name']) ? $options['name'] : static::getInputName($model, $attribute);
        $value = static::getAttributeValue($model, $attribute);

        if (!array_key_exists('value', $options)) {
            $options['value'] = '1';
        }
        if (!array_key_exists('uncheck', $options)) {
            $options['uncheck'] = '0';
        }
        if (!array_key_exists('label', $options)) {
            //$options['label'] = static::encode($model->getAttributeLabel(static::getAttributeName($attribute)));
        }


        $checked = "$value" === "{$options['value']}";

        if (!array_key_exists('id', $options)) {
            $options['id'] = static::getInputId($model, $attribute);
        }

        return static::radio($name, $checked, $options);
    }
    public static function radio($name, $checked = false, $options = [])
    {
        $options['checked'] = (bool) $checked;
        $value = array_key_exists('value', $options) ? $options['value'] : '1';
            return static::input('radio', $name, $value, $options);
    }



}