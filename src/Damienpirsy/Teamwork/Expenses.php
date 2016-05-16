<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\RestfulTrait;

class Expenses extends AbstractObject {

    use RestfulTrait;

    protected $endpoint = 'expenses';
}