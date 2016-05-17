<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\RestfulTrait;

class Tag extends AbstractObject {

    use RestfulTrait;

    protected $wrapper = 'tag';

    protected $endpoint = 'tags';
}