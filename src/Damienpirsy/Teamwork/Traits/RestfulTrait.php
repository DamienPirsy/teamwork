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
     * @param  int $number
     * @return JSON
     */
    public function paginate($number, $pageSize = 200)
    {
        return $this->client->get($this->endpoint, ['page' => $number, 'pageSize' => $pageSize])->response();
    }

    /**
     * @return mixed
     */
    public function find()
    {
        return $this->client->get("$this->endpoint/$this->id")->response();
    }

    /**
     * @param  array $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->client->post("$this->endpoint", [$this->wrapper => $data])->response();
    }

    /**
     * @param  array $data
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