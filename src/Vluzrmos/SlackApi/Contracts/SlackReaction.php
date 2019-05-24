<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackReaction
{
    public function remove($channel, $name, $ts);
    public function add($channel, $text, $ts, $options = []);
    public function lists($channel, $text, $options = []);
    public function get($channel, $text, $ts);
}
