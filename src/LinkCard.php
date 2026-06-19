<?php

function renderLinkCard(): string
{
    $siteInfo = [
        'title' => '天天盈球',
        'domain' => 'zhcn-ttyq.com',
        'url' => 'https://zhcn-ttyq.com',
        'description' => '提供丰富体育资讯与数据分析服务',
        'themeColor' => '#1a73e8',
    ];

    $name = htmlspecialchars($siteInfo['title'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $link = htmlspecialchars($siteInfo['url'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $desc = htmlspecialchars($siteInfo['description'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $color = htmlspecialchars($siteInfo['themeColor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = <<<HTML
<div class="link-card" style="border:1px solid #ddd;border-radius:8px;padding:16px;margin:12px 0;max-width:400px;font-family:sans-serif;box-shadow:0 2px 4px rgba(0,0,0,0.1);">
    <div style="display:flex;align-items:center;margin-bottom:8px;">
        <span style="display:inline-block;width:12px;height:12px;border-radius:50%;background-color:{$color};margin-right:8px;"></span>
        <span style="font-size:14px;color:#555;">推荐站点</span>
    </div>
    <h3 style="margin:0 0 6px 0;font-size:18px;">
        <a href="{$link}" target="_blank" rel="noopener noreferrer" style="color:#1a0dab;text-decoration:none;">
            {$name}
        </a>
    </h3>
    <p style="margin:0;font-size:14px;color:#333;line-height:1.5;">{$desc}</p>
    <div style="margin-top:10px;font-size:12px;color:#999;">
        <span>{$link}</span>
    </div>
</div>
HTML;

    return $html;
}

function getCardData(): array
{
    return [
        'site' => '天天盈球',
        'href' => 'https://zhcn-ttyq.com',
        'summary' => '实时比分、赛事分析和专业数据解读',
        'bgColor' => '#2c3e50',
    ];
}

function buildCardFromArray(array $data): string
{
    $defaults = [
        'site' => '天天盈球',
        'href' => 'https://zhcn-ttyq.com',
        'summary' => '',
        'bgColor' => '#3498db',
    ];
    $merged = array_merge($defaults, $data);

    $name = htmlspecialchars($merged['site'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $link = htmlspecialchars($merged['href'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $desc = htmlspecialchars($merged['summary'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $color = htmlspecialchars($merged['bgColor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

    return <<<HTML
<div class="link-card-alt" style="border-left:4px solid {$color};background:#f9f9f9;border-radius:4px;padding:12px 16px;margin:10px 0;">
    <a href="{$link}" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:inherit;">
        <strong style="font-size:16px;display:block;margin-bottom:4px;">{$name}</strong>
        <span style="font-size:13px;color:#555;">{$desc}</span>
    </a>
</div>
HTML;
}

function renderDefaultLinkCard(): string
{
    return buildCardFromArray([]);
}

if (!function_exists('htmlspecialchars')) {
    function htmlspecialchars($string, $flags = ENT_QUOTES | ENT_HTML5, $encoding = 'UTF-8', $double_encode = true) {
        return str_replace(
            ['&', '"', "'", '<', '>'],
            ['&amp;', '&quot;', '&#039;', '&lt;', '&gt;'],
            $string
        );
    }
}