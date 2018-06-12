<?php
/**
 * Craft Breaking News plugin for Craft CMS 3.x
 *
 * Displays a Breaking News banner on your website
 *
 * @link      pedrops.com
 * @copyright Copyright (c) 2018 Pedro Germani
 */

namespace pedrops\craftbreakingnews\services;

use pedrops\craftbreakingnews\CraftBreakingNews;

use Craft;
use craft\base\Component;

/**
 * CraftBreakingNewsService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Pedro Germani
 * @package   CraftBreakingNews
 * @since     1.0.0
 */
class CraftBreakingNewsService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     CraftBreakingNews::$plugin->craftBreakingNewsService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (CraftBreakingNews::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
