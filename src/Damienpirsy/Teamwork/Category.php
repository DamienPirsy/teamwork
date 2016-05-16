<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\RestfulTrait;

class Category extends AbstractObject {

    use RestfulTrait;

    protected $wrapper  = 'category';

    protected $endpoint = 'projectCategories';
}