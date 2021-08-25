<?php

namespace App\Interfaces;

interface MediaModelInterface
{

    /**
     * Return either single media or an array of media
     * @return object
     */
    public function getMediaPath();

    /**
     * Get url path for media in media handlers
     * @return url
     */
    public function getUrlPath();

    /**
     * Get url for preview version of media in media handlers
     * @return url
     */
    public function getPreviewUrlPath();

    /**
     * Get url for thumbnail version of media in media handlers
     * @return url
     */
    public function getThumbnailUrlPath();
}
