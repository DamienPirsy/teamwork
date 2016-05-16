<?php 
namespace Damienpirsy\Teamwork\Traits;

trait RestfulTrait {

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->client->get($this->endpoint)->response();
    }

    /**
     * Allows for pagination
     * @param  [type] $args
     * @return [type]
     */
    public function paginate($args = null)
    {
        if (null === $args) {
            return $this->all();
        }
        $this->areArgumentsValid($args, ['page']);
        return $this->client->get($this->endpoint, $args)->response();
    }

    /**
     * @return mixed
     */
    public function find()
    {
        return $this->client->get("$this->endpoint/$this->id")->response();
    }

    /**
     * @return array | companyID
     */
    public function create($data)
    {
        return $this->client->post("$this->endpoint", [$this->wrapper => $data])->response();
    }

    /**
     * @return mixed
     */
    public function update($data)
    {
        return $this->client->put("$this->endpoint/$this->id", [$this->wrapper => $data])->response();
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        return $this->client->delete("$this->endpoint/$this->id")->response();
    }


}