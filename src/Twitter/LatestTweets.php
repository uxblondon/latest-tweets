<?php

namespace Twitter;

use TwitterOAuth\TwitterOAuth as TwitterApi;

class LatestTweets
{
    /**
     *
     * @var TwitterApi
     */
    private $api;

    /**
     *
     * @param array $apiConfig
     */
    public function __construct(array $apiConfig)
    {
        $this->api = new TwitterApi($apiConfig);
    }

    public function getLatestTweet($username)
    {
        $tweets = $this->getTweets($username, 1);

        return isset($tweets[0]) ? $tweets[0] : null;
    }

    public function getTweets($username, $howMany)
    {
        $tweets = $this->api->get('statuses/user_timeline', array(
            'screen_name' => $username,
            'exclude_replies' => 'true',
            'include_rts' => 'false',
            'count' => $howMany
        ));

        array_walk($tweets, function(&$tweet) {
            $tweet = new Tweet( (array) $tweet);
        });

        return $tweets;
    }
}