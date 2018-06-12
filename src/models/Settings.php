<?php
/**
 * Craft Breaking News plugin for Craft CMS 3.x
 *
 * Displays a Breaking News banner on your website
 *
 * @link      http://pedrops.com
 * @copyright Copyright (c) 2018 Pedro Germani
 */

namespace pedrops\craftbreakingnews\models;

use pedrops\craftbreakingnews\CraftBreakingNews;

use Craft;
use craft\base\Model;

/**
 * CraftBreakingNews Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Pedro Germani
 * @package   CraftBreakingNews
 * @since     1.0.2
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
	public $someAttribute = 'Some Default Field';
	public $anotherAttribute = 'Another Default Field';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {	
        return [
            [['someAttribute','anotherAttribute'], 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default Settings Field '],
        ];
    }
}
