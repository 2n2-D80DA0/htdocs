<?php
namespace libs;

class Request {
  public array $body;
  public array $params;
  public function __construct(array $body = [], array $params = []) {
    $this->body = [...$body, ...$params];
    unset($this->body["_method"]);
  }

  public function body() : array {
    return $this->body;
  }
  public function params() : array {
    return $this->params;
  }
  public function quest() : array {
    return [...$this->body, ...$this->params];
  }
}

?>