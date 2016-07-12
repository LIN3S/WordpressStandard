<?php

/*
 * This file is part of the WordPress Standard project.
 *
 * Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppTheme\Widgets;

use LIN3S\WPFoundation\Widgets\Widget;
use Timber\Timber;

/**
 * Social network widget. Is fully manageable inside Wordpress administrator panel.
 * This is a little pretty example that you can do extending WPFoundation's Widget class.
 *
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
final class SocialNetworksWidget extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function widget($args, $instance)
    {
        $data = [
            'beforeWidget' => $args['before_widget'],
            'afterWidget'  => $args['after_widget'],
            'beforeTitle'  => $args['before_title'],
            'afterTitle'   => $args['after_title'],
            'twitterUrl'   => (!empty($instance['twitterUrl'])) ? strip_tags($instance['twitterUrl']) : '',
            'facebookUrl'  => (!empty($instance['facebookUrl'])) ? strip_tags($instance['facebookUrl']) : '',
            'pinterestUrl' => (!empty($instance['pinterestUrl'])) ? strip_tags($instance['pinterestUrl']) : '',
            'youtubeUrl'   => (!empty($instance['youtubeUrl'])) ? strip_tags($instance['youtubeUrl']) : '',
            'rssUrl'       => (!empty($instance['rssUrl'])) ? strip_tags($instance['rssUrl']) : '',
        ];

        return Timber::render('widgets/front/socialNetworks.html.twig', $data);
    }

    /**
     * {@inheritdoc}
     */
    public function form($instance)
    {
        $instance['widgetNumber'] = $this->number();
        $instance['widgetName'] = $this->name();

        return Timber::render('widgets/admin/socialNetworks.html.twig', $instance);
    }

    /**
     * {@inheritdoc}
     */
    public function update($newInstance)
    {
        $instance = [
            'twitterUrl'   => (!empty($newInstance['twitterUrl'])) ? strip_tags($newInstance['twitterUrl']) : '',
            'facebookUrl'  => (!empty($newInstance['facebookUrl'])) ? strip_tags($newInstance['facebookUrl']) : '',
            'pinterestUrl' => (!empty($newInstance['pinterestUrl'])) ? strip_tags($newInstance['pinterestUrl']) : '',
            'youtubeUrl'   => (!empty($newInstance['youtubeUrl'])) ? strip_tags($newInstance['youtubeUrl']) : '',
            'rssUrl'       => (!empty($newInstance['rssUrl'])) ? strip_tags($newInstance['rssUrl']) : '',
        ];

        return $instance;
    }
}
