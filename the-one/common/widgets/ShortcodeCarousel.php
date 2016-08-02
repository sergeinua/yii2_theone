<?php
namespace common\widgets; // your App class

use Sunra\PhpSimple\HtmlDomParser;
use yii\base\Widget;

/**
 * Class ShortcodeCarousel widget.Applied vie ShortCodes.
 * [Carousel]
 *
 * [/Carousel]
 * @package common\widgets
 */
class ShortcodeCarousel extends Widget {
    public static function widget($attributes,$content,$widget){

        $content = HtmlDomParser::str_get_html($content);
        $imgs = $content->find('img');
        $resp = '<div class="carousel">
                    <div class="swiper-container">
                      <div class="swiper-wrapper">';
        foreach($imgs as $img){
            $resp.= " <div style='background-image:url({$img->src})' class='swiper-slide'></div>";
        }
        $resp .= ' </div>
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
                </div>
              </div>
            </div>';
        return $resp;
    }

}