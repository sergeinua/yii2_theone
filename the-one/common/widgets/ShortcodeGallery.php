<?php
namespace common\widgets; // your App class

use Sunra\PhpSimple\HtmlDomParser;
use yii\base\Widget;

/**
 * Class ShortcodeGallery a gallery widget.Applied vie ShortCodes.
 * [Gallery]
 *
 * [/Gallery]
 * @package common\widgets
 */
class ShortcodeGallery extends Widget
{
    public static function widget($attributes, $content, $widget)
    {
        $content = HtmlDomParser::str_get_html($content);

        $imgs = $content->find('img');
        $resp = '<div class="gallery-wrapper">
                    <div class="small-gallery">
                        <div class="small-gallery-items article-single-gallery">';
        foreach ($imgs as $img) {
            $resp .= " <div href='{$img->src}' class='gallery-item' title='{$img->alt}'>
                        <img src='{$img->src}' alt='{$img->alt}'>
                        </div>";
        }
        $resp .= ' </div>
                <button role="button" type="button" class="btn-white fa-search show-gallery">
                Cмотреть все
                </button>
              </div>
            </div>';
        return $resp;
    }

}