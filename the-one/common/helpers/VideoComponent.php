<?php
namespace common\helpers;

class  VideoComponent{
    /**
     * Returns video url if it matches patterns.
     *
     * @param $userUrl
     * @return bool|string
     */
    public static function getVideoCode($userUrl){
        if(preg_match('/^(http|https):\/\/w{0,3}.?vimeo.com\/(channels\/\w+\/)?(\d+)/',trim($userUrl), $matches)){
            return 'https://player.vimeo.com/video/'. end($matches);
        }else if(preg_match('/^(http|https):\/\/w{0,3}.?(youtu.be|youtube.com)\/(watch\?v=)?(.+)$/',trim($userUrl), $matches)){
            return 'https://www.youtube.com/embed/'. end($matches);
        }
        return false;
    }
    /**
     * Checks if user did insert iframe code instead of url.
     *
     * @param $userUrl
     * @return bool
     */
    public static function isIframe($userUrl)
    {
        return preg_match('/<iframe.*src/',trim($userUrl));
    }

    /**
     * Checks if url is link to YouTube.
     *
     * @param $userUrl
     * @return bool
     */
    public static function isYoutubeVideo($userUrl){
        return (strpos($userUrl, 'https://www.youtube.com/embed/')!==false)||(strpos($userUrl, 'youtu')!==false);
    }

    /**
     * Checks if url is link to Vimeo
     *
     * @param $userUrl
     * @return bool
     */
    public static function isVimeoVideo($userUrl){
        return (strpos($userUrl, 'https://vimeo.com/')!==false);
    }

    /**
     * Gets video ID.
     *
     * @param $contentUrl
     * @return mixed
     */
    public static function getCodeVideo($contentUrl){
        $code = str_replace('https://player.vimeo.com/video/','',$contentUrl);
        return str_replace('https://www.youtube.com/embed/','',$code);
    }


    /**
     * Returns video thumb image.
     *
     * @param $contentUrl
     * @return bool|string
     */
    public static function getVideoThumbnail($contentUrl){
        if(self::isVimeoVideo($contentUrl)){
            $json=file_get_contents('https://vimeo.com/api/oembed.json?url='.urlencode($contentUrl));
            $json = Json::decode($json);
            return (isset($json['thumbnail_url']))?$json['thumbnail_url']:'';
        }else if(self::isYoutubeVideo($contentUrl)){
            return 'http://img.youtube.com/vi/'.self::getCodeVideo(self::getVideoCode($contentUrl)).'/hqdefault.jpg';
        }
        return false;
    }
}