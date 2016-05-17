<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\RestfulTrait;

class Calendar extends AbstractObject {

    use RestfulTrait;

    protected $wrapper = 'event';
    protected $endpoint = 'calendarevents';

    /**
     * @Override
     * @param  array $args
     * @return array
     */
    public function all($args)
    {
        $this->areArgumentsValid($args, ['startDate', 'endDate', 'showDeleted', 'updatedAfterDate', 'eventTypeId', 'page']);
        return $this->client->get($this->endpoint, $args)->response();        
    }

    /**
     *  Get event types
     *  GET /calendareventtypes.json
     */
    public function types()
    {
        return $this->client->get('calendareventtypes', [])->response();
    }
}