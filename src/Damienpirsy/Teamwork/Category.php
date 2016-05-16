<?php  namespace Rossedman\Teamwork;

use Rossedman\Teamwork\Traits\RestfulTrait;

class Category extends AbstractObject {

    use RestfulTrait;

    protected $wrapper  = 'category';

    protected $endpoint = 'projectCategories';
}