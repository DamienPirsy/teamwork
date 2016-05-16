<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\RestfulTrait;

class Invoices extends AbstractObject {

    use RestfulTrait;

    protected $endpoint = 'invoices';

    /**
     * GET /invoices.json
     * @args type -> all|completed|active(default), projectStatus ->all|archive|active(default), page
     * @return mixed
     */
    public function all($args = null)
    {
        $this->areArgumentsValid($args, ['type', 'projectStatus', 'page']);
        return $this->client->get($this->endpoint, $args)->response();
    }

    /**
     * Mark an invoice as complete
     * PUT /invoices/{$id}/complete.json
     *
     * @return JSON
     */
    public function complete()
    {
        return $this->client->put("$this->endpoint/$this->id/complete", [])->response();
    }

    /**
     * Mark an invoice as NOT complete
     * PUT /invoices/{$id}/uncomplete.json
     *
     * @return mixed
     */
    public function uncomplete()
    {
        return $this->client->put("$this->endpoint/$this->id/uncomplete", [])->response();
    }

    /**
     * Gets a list of currency codes
     * GET /currencycodes.json
     * @return JSON
     */
    public function currencies()
    {
        return $this->client->put("currencycodes"; [])->response();
    }
}