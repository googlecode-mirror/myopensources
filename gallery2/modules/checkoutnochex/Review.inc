<?php
/*
 * $RCSfile: Review.inc,v $
 *
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2004 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * @version
 * @package CheckoutNoChex
 * @author Dayo Akanji <info@dakanji.com>
 */

/**
 * This view is for collecting the user's Review
 *
 * @package checkoutnochex
 * @subpackage UserInterface
 */


class ReviewView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
        global $gallery;
   
        list ($ret, $module) = GalleryCoreApi::loadPlugin('module','checkoutnochex');
        if ($ret) {
            return array($ret->wrap(__FILE__, __LINE__), null);
        }

        $template->setVariable('form', $form);
        $template->title($gallery->i18n('Checkout') . '::' . 
                         $gallery->i18n('Review Details'));

        return array(null,
               array('body' => 'modules/checkoutnochex/templates/Review.tpl'));
    }
}
?>
