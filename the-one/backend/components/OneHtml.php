<?php
namespace backend\components;

use common\models\Article;
use yii\helpers\ArrayHelper;

class OneHtml extends \yii\helpers\Html
{
    protected static $articleList;

    public static function activeArticleList($model, $attribute, $selectedVal, $label = "Статья")
    {
        if (!isset(self::$articleList)) {
            self::$articleList = Article::getSelect2RelatedArticlesData();
        }
        $i = 0;
        $n = 0;
        foreach(self::$articleList as $item) :
            if($item['text'] == "дополнительные материалы.") :
                $n = $i;
            endif;
            $i++;
        endforeach;
        unset(self::$articleList[$n]);
        $name = (new \ReflectionClass($model))->getShortName() . $attribute;
        $html = "<div class='form-group'>"
            . "<label class='control-label'>$label</label><br>"
            . "<select class='select2 articles form-control' style='width:100%' name='$name'>";
        $html.='<option>Выберите</option>';
        foreach (self::$articleList as $item) {
            $html .= "<optgroup label='{$item['text']}'>";
            foreach ($item['children'] as $key => $children) {
                $selected = $children['id'] == $selectedVal ? 'selected' : '';
                $html .= "<option $selected value='{$children['id']}'>{$children['text']}</option>";
            }
            $html .= "</optgroup>";
        }
        $html .= "</select>";
        $html .= "</div>";
        return $html;
    }
}