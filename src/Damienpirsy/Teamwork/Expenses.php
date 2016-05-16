<?php  namespace Rossedman\Teamwork;

use Rossedman\Teamwork\Traits\RestfulTrait;

class Expenses extends AbstractObject {

    use RestfulTrait;

    protected $endpoint = 'expenses';
}