<?php
/**
 * Craft Breaking News plugin for Craft CMS 3.x
 *
 * Displays a Breaking News banner on your website
 *
 * @link      http://pedrops.com
 * @copyright Copyright (c) 2018 Pedro Germani
 */

namespace pedrops\craftbreakingnews\variables;

use pedrops\craftbreakingnews\CraftBreakingNews;

use Craft;

/**
 * Craft Breaking News Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.craftBreakingNews }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Pedro Germani
 * @package   CraftBreakingNews
 * @since     1.0.2
 */
class CraftBreakingNewsVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.craftBreakingNews.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.craftBreakingNews.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
