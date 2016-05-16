<?php  namespace Rossedman\Teamwork;

use Rossedman\Teamwork\Traits\RestfulTrait;

class Webhook extends AbstractObject {

    use RestfulTrait;

    protected $wrapper  = 'webhook';

    protected $endpoint = 'webhooks';

    /**
     * Returns a list of webhooks available
     * GET /webhooks/events.json
     */
    public function available()
    {
        return $this->client->get("$this->endpoint/events")->response();
    }

    /**
     * Resumes a specific webhook
     * PUT /webhooks/{id}/resume.json
     */
    public function resume()
    {
        return $this->client->put("$this->endpoint/$this->id/resume")->response();
    }

    /**
     * Pauses a specific webhook
     * PUT /webhooks/{id}/pause.json
     */
    public function pause()
    {
        return $this->client->put("$this->endpoint/$this->id/pause")->response();
    }

    /**
     * Enables webhooks on TW account
     * PUT /webhooks/enable.json
     */
    public function enable()
    {
        return $this->client->put("$this->endpoint/enable")->response();
    }

    /**
     * Disables webhooks on TW account
     * PUT /webhooks/disable.json
     */
    public function disable()
    {
        return $this->cliente->put("$this->endpoint/disable")->response();
    }

}