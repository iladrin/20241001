<?php

function redirect(string $url): void
{
    header("Location: $url");
}

function forward(string $page, array &$requestStack): void
{
    $requestStack[] = $page;
}
