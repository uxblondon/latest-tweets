<?php

namespace Twitter;

class Tweet
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}