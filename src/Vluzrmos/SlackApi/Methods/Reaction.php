<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackReaction;

class Reaction extends SlackMethod implements SlackReaction
{
    protected $methodsGroup = 'reaction.';

    /**
     * This method deletes a message from a channel.
     *
     * @see https://api.slack.com/methods/chat.delete
     *
     * @param string     $channel Channel containing the message to be deleted.
     * @param int|string $name    Reaction (emoji) name.
     * @param int|string $ts      Timestamp of the message to be deleted.
     *
     * @return array
     */
    public function remove($channel, $name, $ts)
    {
        return $this->method('delete', compact('channel', 'ts'));
    }

    /**
     * This method posts a message to a channel.
     *
     * @see https://api.slack.com/methods/chat.postMessage
     *
     * @param string $channel Channel to send message to. Can be a public channel, private group or IM channel. Can be an encoded ID, or a name.
     * @param string $name Reaction (emoji) name.
     * @param int|string $ts Timestamp of the message to be updated.
     * @param array $options
     *
     * @example
     * <pre>
     * [
     *    "username" => "My Bot", //Name of bot.
     *    "as_user"  => true, //Pass true to post the message as the authed user, instead of as a bot
     *    "parse"    => "full", //Change how messages are treated. See below.
     *    "link_names" => 1, //Find and link channel names and usernames.
     *    "attachments" => ["pretext" => "pre-hello", "text" => "text-world"], //Structured message attachments.
     *	  "unfurl_links" => true, //Pass true to enable unfurling of primarily text-based content.
     *    "unfurl_media" => true, //Pass false to disable unfurling of media content.
     *    "icon_url" => "http://lorempixel.com/48/48", //URL to an image to use as the icon for this message
     *    "icon_emoji"=> ":chart_with_upwards_trend:" //emoji to use as the icon for this message. Overrides icon_url.
     * ]
     *</pre>
     * @return array
     */
    public function add($channel, $name, $ts, $options = [])
    {
        return $this->method('add', array_merge(compact('channel', 'name','ts'), $options));
    }


    /**
     * This method updates a message in a channel.
     *
     * @param string $channel Channel containing the message to be updated.
     * @param string $text New text for the message, using the default formatting rules.
     * @param array $options Timestamp of the message to be updated.
     *
     * @return array
     */
    public function lists($channel, $text, $options = [])
    {
        return $this->method('update', compact('channel', 'text', 'options'));
    }

    /**
     * This method updates a message in a channel.
     *
     * @param string $channel Channel containing the message to be updated.
     * @param string $text New text for the message, using the default formatting rules.
     * @param int|string $ts Timestamp of the message to be updated.
     *
     * @return array
     */
    public function get($channel, $text, $ts)
    {
        return $this->method('update', compact('channel', 'text', 'ts'));
    }
}
