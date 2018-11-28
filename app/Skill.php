<?php
// php artisan make:migration create_skill_table --create=skill
// php artisan migrate
namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skill';

    /**
     * The skillset id the skill belongs to.
     * 
     * @var string
     */
    protected $sid;

    /**
     * The name of the skill
     * 
     * @var string
     */
    protected $name;

    /**
     * The type of skill
     * 
     * @var string
     */
    protected $type;

    /**
     * Has the skill been used in development?
     * 
     * @var boolean
     */
    protected $development;

    /**
     * Has the skill been used in production?
     * 
     * @var boolean
     */
    protected $production;

}
