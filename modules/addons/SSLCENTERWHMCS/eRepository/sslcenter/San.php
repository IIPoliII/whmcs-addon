<?php

namespace MGModule\SSLCENTERWHMCS\eRepository\sslcenter;

use Exception;

class San {

    /**
     * Types:
     * 
     * * text
     * * password
     * * yesno
     * * dropdown
     * * radio
     * * textarea
     */
    public static function getTitle() {
        return \MGModule\SSLCENTERWHMCS\mgLibs\Lang::getInstance()->T('sansTitle');
    }

    public static function getFields($limit, $limitwildcard = 0) {
        $fields                 = [];
        $fields['sans_domains'] = [
            'FriendlyName' => \MGModule\SSLCENTERWHMCS\mgLibs\Lang::getInstance()->T('sansFreindlyName') . sprintf(' (%s)', $limit),
            'Type'         => 'textarea',
            'Size'         => '30',
            'Description'  => '<br>' . \MGModule\SSLCENTERWHMCS\mgLibs\Lang::getInstance()->T('sansDescription'),
            'Required'     => false,

        ];
        $fields['wildcard_san'] = [
            'FriendlyName' => \MGModule\SSLCENTERWHMCS\mgLibs\Lang::getInstance()->T('wildcardSansFreindlyName') . sprintf(' (%s)', $limitwildcard),
            'Type'         => 'textarea',
            'Size'         => '30',
            'Description'  => '<br>' . \MGModule\SSLCENTERWHMCS\mgLibs\Lang::getInstance()->T('sansDescription'),
            'Required'     => false,

        ];
        return $fields;
    }
}
