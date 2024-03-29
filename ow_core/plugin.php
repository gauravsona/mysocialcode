<?php

/**
 * EXHIBIT A. Common Public Attribution License Version 1.0
 * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the “License”);
 * you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://www.oxwall.org/license. The License is based on the Mozilla Public License Version 1.1
 * but Sections 14 and 15 have been added to cover use of software over a computer network and provide for
 * limited attribution for the Original Developer. In addition, Exhibit A has been modified to be consistent
 * with Exhibit B. Software distributed under the License is distributed on an “AS IS” basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language
 * governing rights and limitations under the License. The Original Code is Oxwall software.
 * The Initial Developer of the Original Code is Oxwall Foundation (http://www.oxwall.org/foundation).
 * All portions of the code written by Oxwall Foundation are Copyright (c) 2011. All Rights Reserved.

 * EXHIBIT B. Attribution Information
 * Attribution Copyright Notice: Copyright 2011 Oxwall Foundation. All rights reserved.
 * Attribution Phrase (not exceeding 10 words): Powered by Oxwall community software
 * Attribution URL: http://www.oxwall.org/
 * Graphic Image as provided in the Covered Code.
 * Display of Attribution Information is required in Larger Works which are defined in the CPAL as a work
 * which combines Covered Code or portions thereof with code not governed by the terms of the CPAL.
 */

/**
 * Base plugin object.
 *
 * @author Sardar Madumarov <madumarov@gmail.com>
 * @package ow_core
 * @since 1.0
 */
class OW_Plugin
{
    /**
     * Plugin dir/module name.
     *
     * @var string
     */
    protected $dirName;
    /**
     * Plugin unique key.
     *
     * @var string
     */
    protected $key;
    /**
     * @var boolean
     */
    protected $active;
    /**
     * @var BOL_Plugin
     */
    protected $dto;

    /**
     * Constructor.
     *
     * @param array $params
     */
    public function __construct( $params )
    {
        if ( isset($params['dir_name']) )
        {
            $this->dirName = trim($params['dir_name']);
        }

        if ( isset($params['key']) )
        {
            $this->key = trim($params['key']);
        }

        if ( isset($params['active']) )
        {
            $this->active = (bool) $params['active'];
        }

        if ( isset($params['dto']) )
        {
            $this->dto = $params['dto'];
        }
    }

    /**
     * Returns plugin dir/module name.
     *
     * @return string
     */
    public function getDirName()
    {
        return $this->dirName;
    }

    /**
     * Returns plugin unique key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Checks if plugin is active.
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Returns plugin data transfer object.
     *
     * @return BOL_Plugin
     */
    public function getDto()
    {
        return $this->dto;
    }

    public function getUserFilesDir()
    {
        return OW_DIR_PLUGIN_USERFILES . $this->getDirName() . DS;
    }

    public function getUserFilesUrl()
    {
        return OW_URL_PLUGIN_USERFILES . $this->getDirName() . '/';
    }

    public function getPluginFilesDir()
    {
        return OW_DIR_PLUGINFILES . $this->getDirName() . DS;
    }

    public function getRootDir()
    {
        return OW_DIR_PLUGIN . $this->dirName . DS;
    }

    public function getCmpDir()
    {
        return $this->getRootDir() . 'components' . DS;
    }

    public function getViewDir()
    {
        return $this->getRootDir() . 'views' . DS;
    }

    public function getCmpViewDir()
    {
        return $this->getViewDir() . 'components' . DS;
    }

    public function getCtrlViewDir()
    {
        return $this->getViewDir() . 'controllers' . DS;
    }

    public function getDecoratorViewDir()
    {
        return $this->getViewDir() . 'decorators' . DS;
    }

    public function getCtrlDir()
    {
        return $this->getRootDir() . 'controllers' . DS;
    }

    public function getDecoratorDir()
    {
        return $this->getRootDir() . 'decorators' . DS;
    }

    public function getStaticDir()
    {
        return $this->getRootDir() . 'static' . DS;
    }

    public function getBolDir()
    {
        return $this->getRootDir() . 'bol' . DS;
    }

    public function getClassesDir()
    {
        return $this->getRootDir() . 'classes' . DS;
    }

    public function getStaticJsDir()
    {
        return $this->getStaticDir() . 'js' . DS;
    }

    public function getModuleName()
    {
        return $this->dirName;
    }

    public function getStaticUrl()
    {
        return OW_URL_STATIC_PLUGINS . $this->getModuleName() . '/';
    }

    public function getStaticJsUrl()
    {
        return $this->getStaticUrl() . 'js/';
    }

    public function getStaticCssUrl()
    {
        return $this->getStaticUrl() . 'css/';
    }
}

class OW_SystemPlugin extends OW_Plugin
{

    public function __construct( $params )
    {
        parent::__construct($params);
    }

    /**
     * @see OW_Plugin::getRootDir()
     *
     * @return unknown
     */
    public function getRootDir()
    {
        return OW_DIR_SYSTEM_PLUGIN . $this->dirName . DS;
    }
}
