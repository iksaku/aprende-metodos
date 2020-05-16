<?php

namespace App\Markdown;

use App\Markdown\Emoji\EmojiExtension;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Environment;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;

class MarkdownConverter
{
    public static function makeConverter(): CommonMarkConverter
    {
        return self::createConverter(Environment::createGFMEnvironment());
    }

    private static function createConverter(ConfigurableEnvironmentInterface $environment): CommonMarkConverter
    {
        $environment
            ->addExtension(new HeadingPermalinkExtension());

        return new CommonMarkConverter(config('markdown', []), $environment);
    }
}
