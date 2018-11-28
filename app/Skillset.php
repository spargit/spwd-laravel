<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skillset extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skillset';

    /**
     * The skill category name.
     * 
     * @var string
     */
    protected $title;

    /**
     * A description for the category.
     * 
     * @var string
     */
    protected $description;

    /**
     * A list of all associated skills for this skillset.
     */
    public function skills()
    {
        return $this->hasMany('App\Skill')->orderBy('name');
    }
}
