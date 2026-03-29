<?php
namespace Core;

class Request {
  
  
  public function __construct(
    public array $body = [],
    public array $params = []
  ) {
    unset($this->body["method"]);
  }

  public function body() : array {
    return $this->body;
  }
  public function params() : array {
    return $this->params;
  }
  public function quest(string $name = "") : mixed {
    if($name !== "" && isset([...$this->body, ...$this->params][$name]))
      return [...$this->body, ...$this->params][$name];
    return [...$this->body, ...$this->params];
  }
}

?>