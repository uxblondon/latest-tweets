<?php

namespace Twitter;

use DateTimeImmutable;

class Tweet
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     *
     * @return DateTimeImmutable
     */
    public function getCreatedAt()
    {
        return new DateTimeImmutable('@' . strtotime($this->data['created_at']));
    }

    /**
     *
     * @return string
     */
    public function getFormattedText()
    {
        $autolink = new Autolink;

        return $autoling->autoLink($this->getText());
    }

    /**
     *
     * @return string
     */
    public function getScreenName()
    {
        return $this->data['screen_name'];
    }

    /**
     *
     * @return string
     */
    public function getText()
    {
        return $this->data['text'];
    }
}