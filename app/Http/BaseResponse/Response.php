<?php


namespace App\Http\BaseResponse;

class Response
{
	public $statusCode;

	public $error;

	public $message;

	public $_payload;

	public function __construct(int $statusCode, bool $error, string $message, $_payload)
	{
		$this->statusCode = $statusCode;
		$this->error = $error;
		$this->message = $message;
		$this->_payload = $_payload;
	}

	public function getStatusCode(): int
	{
		return $this->statusCode;
	}

	public function get()
	{
		return $this;
	}

	public function getStatus(): bool
	{
		return $this->error;
	}

	public function setStatus(bool $error): void
	{
		$this->error = $error;
	}

	public function getMessage(): string
	{
		return $this->message;
	}

	public function setMessage(string $message): void
	{
		$this->message = $message;
	}

	public function getEntity()
	{
		return $this->_payload;
	}

	public function setEntity($_payload): void
	{
		$this->_payload = $_payload;
	}

}
